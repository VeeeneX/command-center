<?php

namespace VeeeneX\CommandCenter;

use App;
use VeeeneX\CommandCenter\Event\EventDispatcher;

/**
 * Dispatches events for Laravel entities.
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
trait Dispatcher
{
    /**
     * Dispatch all events for an entity.
     *
     * @param $entity
     * @return mixed
     */
    public function dispatchEventsFor($entity)
    {
        return $this->getDispatcher()->dispatch($entity->releaseEvents());
    }

    /**
     * Get new instance of CommandCenter event dispatcher.
     *
     * @return mixed
     */
    private function getDispatcher()
    {
        return App::make(EventDispatcher::class);
    }
}
