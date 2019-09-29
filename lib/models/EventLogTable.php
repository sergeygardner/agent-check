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
 * Class EventLogTable
 *
 * @package Bitrix\Agent\models
 */
class EventLogTable extends Entity\DataManager
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
        return 'b_event_log';
    }

    /**
     * @return array
     */
    public static function getMap()
    {
        return [

            'ID'            => [
                'data_type'    => 'integer',
                'primary'      => true,
                'autocomplete' => true,
            ],
            'TIMESTAMP_X'   => [
                'data_type' => 'datetime',
            ],
            'SEVERITY'      => [
                'data_type' => 'string',
            ],
            'AUDIT_TYPE_ID' => [
                'data_type' => 'string',
            ],
            'MODULE_ID'     => [
                'data_type' => 'string',
            ],
            'ITEM_ID'       => [
                'data_type' => 'string',
            ],
            'REMOTE_ADDR'   => [
                'data_type' => 'string',
            ],
            'USER_AGENT'    => [
                'data_type' => 'string',
            ],
            'REQUEST_URI'   => [
                'data_type' => 'string',
            ],
            'SITE_ID'       => [
                'data_type' => 'string',
            ],
            'USER_ID'       => [
                'data_type' => 'integer',
            ],
            'GUEST_ID'      => [
                'data_type' => 'integer',
            ],
            'DESCRIPTION'   => [
                'data_type' => 'string',
            ],
        ];
    }
}
