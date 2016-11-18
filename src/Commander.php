<?php

namespace VeeeneX\CommandCenter\Laravel;

use App;
use VeeeneX\CommandCenter\CommandBus;

/**
 * Executes commands for Laravel controllers.
 *
 * @package VeeeneX\CommandCenter\Laravel
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
trait Commander
{
    /**
     * Execute a command using the CommandCenter command bus.
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * Get new instance of CommandCenter command bus.
     *
     * @return mixed
     */
    private function getCommandBus()
    {
        return App::make(CommandBusInterface::class);
    }
}
