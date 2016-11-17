<?php

namespace VeeeneX\CommandCenter;

/**
 * Interface CommandBus
 *
 * @package Flyingfoxx\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
interface CommandBusInterface
{
    /**
     * Execute a command.
     *
     * @param $command
     * @return mixed
     */
    public function execute($command);
}
