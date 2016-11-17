<?php

namespace VeeeneX\CommandCenter\Event;

/**
 * Generates events to be dispatched within the CommandCenter application.
 *
 * @package VeeeneX\CommandCenter\Eventing
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
trait EventGenerator
{
    /**
     * List of current pending events.
     *
     * @var array
     */
    protected $pendingEvents = [];

    /**
     * Raise a new pending event.
     *
     * @param $event
     * @return mixed
     */
    public function raise($event)
    {
        return $this->pendingEvents[] = $event;
    }

    /**
     * Return and clear all pending events.
     *
     * @return array
     */
    public function releaseEvents()
    {
        $events = $this->pendingEvents;

        $this->pendingEvents = [];

        return $events;
    }

    /**
     * Get a list of current pending events.
     *
     * @return array
     */
    public function getPendingEvents()
    {
        return $this->pendingEvents;
    }
}
