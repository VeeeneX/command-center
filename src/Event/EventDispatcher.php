<?php

namespace VeeeneX\CommandCenter\Event;

use VeeeneX\CommandCenter\CommandApplication;
use VeeeneX\CommandCenter\CommandApplicationInterface;

/**
 * Dispatches events within the CommandCenter application.
 *
 * @package VeeeneX\CommandCenter\Eventing
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
class EventDispatcher
{
    /**
     * The CommandCenter application.
     *
     * @var \VeeeneX\CommandCenter\CommandApplicationInterface
     */
    protected $app;

    /**
     * Create a new CommandCenter event dispatcher.
     *
     * @param CommandApplicationInterface $app
     */
    public function __construct(CommandApplicationInterface $app)
    {
        $this->app = $app;
    }

    /**
     * Dispatch all events.
     *
     * @param array $events
     */
    public function dispatch(array $events)
    {
        foreach ($events as $event) {
            $eventName = $this->getEventName($event);

            $this->app->fireEvent($eventName, $event);
            $this->app->logEvent($eventName .' was fired.');
        }
    }

    /**
     * Get the formatted event name to fire and log.
     *
     * @param $event
     * @return mixed
     */
    private function getEventName($event)
    {
        return str_replace('\\', '.', get_class($event));
    }
}
