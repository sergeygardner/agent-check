<?php

/**
 * Created by PhpStorm.
 * User: gsv
 * Date: 26.09.2019
 * Time: 19:00
 */

namespace Bitrix\Agent;

use CEventLog;
use Bitrix\Main\Type\DateTime;

/**
 * Class AgentCheck
 *
 * @package Bitrix\Agent
 */
class AgentCheck implements IAgentCheck
{

    /**
     * @var
     */
    protected static $db;

    /**
     * @var array
     */
    protected $model;

    /**
     * @var models\Agent
     */
    protected $agentModel;

    /**
     * @var models\EventLog
     */
    protected $eventLogModel;

    /**
     * AgentCheck constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return DateTime
     */
    protected static function getTime(): DateTime
    {
        return DateTime::createFromTimestamp(strtotime('+10 minute'));
    }

    /**
     * @return mixed
     */
    protected static function getDb()
    {
        if (null === static::$db) {
            static::$db = \Bitrix\Main\Application::getConnection();
        }

        return static::$db;
    }

    /**
     * @return bool
     */
    public function isModel(): bool
    {
        return !empty($this->getModel());
    }

    /**
     * @return array
     */
    public function getModel(): array
    {
        if (null === $this->model) {
            $this->setModel();
        }

        return $this->model;
    }

    /**
     * @param array|null $model
     *
     * @return IAgentCheck
     */
    public function setModel(array $model = null): IAgentCheck
    {
        if (null === $model) {
            $model = [];
            $agentsQuery = $this->getAgentModel()->getList(
                [
                    'filter' => [
                        'ACTIVE'     => 'Y',
                        '<NEXT_EXEC' => static::getTime(),
                    ],
                ]
            );

            while ($agent = $agentsQuery->Fetch()) {
                $model[] = $agent;
            }
        }

        $this->model = $model;

        return $this;
    }

    /**
     * @return IAgentCheck
     */
    public function run(): IAgentCheck
    {
        try {
            foreach ($this->getModel() as $agent) {
                $nextExec = strtotime((string)$agent['NEXT_EXEC']);
                $lastExec = strtotime((string)$agent['LAST_EXEC']);
                $deltaExec = abs($nextExec - time());

                $this->getEventLogModel()::add(
                    [
                        "SEVERITY"      => "WARNING",
                        "AUDIT_TYPE_ID" => "AGENT_EXEC",
                        "MODULE_ID"     => static::class,
                        "ITEM_ID"       => $agent['ID'],
                        "DESCRIPTION"   => "Простой:".$deltaExec.' c, Последний раз выполнялся: '.$lastExec,
                    ]
                );
            }
        } catch (\Throwable $e) {
            AddMessage2Log($e->getMessage(), static::class, 2, true);
        }

        return $this;
    }

    /**
     * @return models\EventLog
     */
    protected function getEventLogModel(): models\EventLogTable
    {
        if (null === $this->eventLogModel) {
            $this->eventLogModel = new models\EventLogTable;
        }

        return $this->eventLogModel;
    }

    /**
     * @return models\Agent
     */
    protected function getAgentModel(): models\AgentTable
    {
        if (null === $this->agentModel) {
            $this->agentModel = new models\AgentTable;
        }

        return $this->agentModel;
    }
}