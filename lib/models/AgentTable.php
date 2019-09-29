<?php

/**
 * Created by PhpStorm.
 * User: gsv
 * Date: 28.09.2019
 * Time: 22:21
 */

namespace Bitrix\Agent\models;

use Bitrix\Main\Entity;

/**
 * Class Agent
 *
 * @package Bitrix\Agent\models
 */
class AgentTable extends Entity\DataManager
{

    /**
     * @return string
     */
    public static function getFilePath()
    {
        return __FILE__;
    }

    /**
     * @return string
     */
    public static function getTableName()
    {
        return 'b_agent';
    }

    /**
     * @return array
     */
    public static function getMap()
    {
        return [

            'ID'             => [
                'data_type'    => 'integer',
                'primary'      => true,
                'autocomplete' => true,
            ],
            'MODULE_ID'      => [
                'data_type' => 'string',
            ],
            'SORT'           => [
                'data_type' => 'integer',
            ],
            'NAME'           => [
                'data_type' => 'string',
            ],
            'ACTIVE'         => [
                'data_type' => 'string',
            ],
            'LAST_EXEC'      => [
                'data_type' => 'datetime',
            ],
            'NEXT_EXEC'      => [
                'data_type' => 'datetime',
            ],
            'DATE_CHECK'     => [
                'data_type' => 'datetime',
            ],
            'AGENT_INTERVAL' => [
                'data_type' => 'integer',
            ],
            'IS_PERIOD'      => [
                'data_type' => 'string',
            ],
            'USER_ID'        => [
                'data_type' => 'integer',
            ],
            'RUNNING'        => [
                'data_type' => 'string',
            ],
        ];
    }
}
