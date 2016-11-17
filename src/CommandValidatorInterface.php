<?php

namespace VeeeneX\CommandCenter;

/**
 * Interface CommandValidator
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
interface CommandValidatorInterface
{
    /**
     * Validate a command.
     *
     * @param $command
     * @return mixed
     */
    public function validate($command);
}
