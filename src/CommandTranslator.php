<?php

namespace VeeeneX\CommandCenter;
use VeeeneX\CommandCenter\Exception\HandlerNotRegisteredException;

/**
 * CommandTranslator
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
class CommandTranslator implements CommandTranslatorInterface
{
    /**
     * Translate a command to its respective handler.
     *
     * @param $command
     * @return mixed
     * @throws HandlerNotRegisteredException
     */
    public function toHandler($command)
    {
        $class = get_class($command);

        if (isset(config('cqrs.commands')[$class])) {
            $handlerClass = config('cqrs.commands')[$class];
        } else {
            $message = "Command handler for [$class] is not defined.";
            throw new HandlerNotRegisteredException($message);
        }

        if (!class_exists($handlerClass)) {
            $message = "Command handler [$handlerClass] does not exist.";
            throw new HandlerNotRegisteredException($message);
        }

        return $handlerClass;
    }

    /**
     * Translate a command to its respective validator.
     *
     * @param $command
     * @return mixed
     */
    public function toValidator($command)
    {

    }
}