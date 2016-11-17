<?php

namespace VeeeneX\CommandCenter;

/**
 * Interface CommandHandler
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
interface CommandHandlerInterface
{
    /**
     * Handle a command.
     *
     * @param $command
     * @return mixed
     */
    public function handle($command);
}
