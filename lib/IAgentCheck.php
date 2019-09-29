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
     * @param array|null $model
     *
     * @return IAgentCheck
     */
    public function setModel(array $model = null): IAgentCheck;

    /**
     * @return bool
     */
    public function isModel(): bool;

    /**
     * @return array
     */
    public function getModel(): array;

    /**
     * @return IAgentCheck
     */
    public function run(): IAgentCheck;
}