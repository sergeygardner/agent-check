<?php

/**
 * Created by PhpStorm.
 * User: gsv
 * Date: 26.09.2019
 * Time: 19:00
 */

namespace Bitrix\Agent;

/**
 * Class AgentCheck
 *
 * @package Bitrix\Agent
 */
class AgentCheck implements IAgentCheck
{

    /**
     * @var array
     */
    protected $list;

    /**
     * @var array
     */
    protected $listFail = [];

    /**
     * @var array
     */
    protected $listSuccess = [];

    /**
     * AgentCheck constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return bool
     */
    public function isList(): bool
    {
        return !empty($this->getList());
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        if (null === $this->list) {
            $this->setList();
        }

        return $this->list;
    }

    /**
     * @param null $model
     *
     * @return IAgentCheck
     */
    public function setList($model = null): IAgentCheck
    {
        $this->list = $model ?? [];

        return $this;
    }

    /**
     * @return bool
     */
    public function isListFail(): bool
    {
        return !empty($this->getListFail());
    }

    /**
     * @return array
     */
    public function getListFail(): array
    {
        if (null === $this->listFail) {
            $this->setListFail();
        }

        return $this->listFail;
    }

    /**
     * @param null $model
     *
     * @return IAgentCheck
     */
    public function setListFail($model = null): IAgentCheck
    {
        $this->listFail = $model ?? [];

        return $this;
    }

    /**
     * @return bool
     */
    public function isListSuccess(): bool
    {
        return !empty($this->getListSuccess());
    }

    /**
     * @return array
     */
    public function getListSuccess(): array
    {
        if (null === $this->listSuccess) {
            $this->setListSuccess();
        }

        return $this->listSuccess;
    }

    /**
     * @param null $model
     *
     * @return IAgentCheck
     */
    public function setListSuccess($model = null): IAgentCheck
    {
        $this->listSuccess = $model ?? [];

        return $this;
    }

    /**
     * @return IAgentCheck
     */
    public function run(): IAgentCheck
    {
        return $this;
    }
}