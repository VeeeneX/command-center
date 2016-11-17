<?php

namespace VeeeneX\CommandCenter;

/**
 * Interface CommandTranslator
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
interface CommandTranslatorInterface
{
    /**
     * Translate a command to its respective handler.
     *
     * @param $command
     * @return mixed
     */
    public function toHandler($command);

    /**
     * Translate a command to its respective validator.
     *
     * @param $command
     * @return mixed
     */
    public function toValidator($command);
}
