<?php

/**
 * Created by PhpStorm.
 * User: gsv
 * Date: 26.09.2019
 * Time: 19:00
 */

namespace Bitrix\Agent;

/**
 * Interface AgentCheck
 *
 * @package Bitrix\Agent
 */
interface IAgentCheck
{

    /**
     * @param null $model
     *
     * @return IAgentCheck
     */
    public function setList($model = null): IAgentCheck;

    /**
     * @return bool
     */
    public function isList(): bool;

    /**
     * @return array
     */
    public function getListFail(): array;

    /**
     * @param null $model
     *
     * @return IAgentCheck
     */
    public function setListFail($model = null): IAgentCheck;

    /**
     * @return bool
     */
    public function isListFail(): bool;

    /**
     * @return array
     */
    public function getListSuccess(): array;

    /**
     * @param null $model
     *
     * @return IAgentCheck
     */
    public function setListSuccess($model = null): IAgentCheck;

    /**
     * @return bool
     */
    public function isListSuccess(): bool;

    /**
     * @return IAgentCheck
     */
    public function run(): IAgentCheck;
}