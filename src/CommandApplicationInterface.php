<?php

namespace VeeeneX\CommandCenter;

/**
 * Interface CommandApplication
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
interface CommandApplicationInterface
{
    /**
     * Create a new class instance within the Application.
     *
     * @param $className
     * @return mixed
     */
    public function make($className);

    /**
     * Fire an event within the Application.
     *
     * @param $eventName
     * @param $event
     * @return mixed
     */
    public function fireEvent($eventName, $event);

    /**
     * Log an event within the Application.
     *
     * @param $message
     * @return mixed
     */
    public function logEvent($message);
}
