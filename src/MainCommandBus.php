<?php

namespace VeeeneX\CommandCenter;

/**
 * Transports commands to their respective handlers.
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
class MainCommandBus implements CommandBusInterface
{
    /**
     * The CommandCenter application.
     *
     * @var CommandApplication
     */
    protected $app;

    /**
     * The CommandCenter translator.
     *
     * @var CommandTranslator
     */
    protected $translator;

    /**
     * Create a new CommandCenter main command bus instance.
     *
     * @param CommandApplicationInterface $app
     * @param CommandTranslatorInterface $translator
     */
    public function __construct(CommandApplicationInterface $app, CommandTranslatorInterface $translator)
    {
        $this->app = $app;
        $this->translator = $translator;
    }

    /**
     * Execute a command.
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        $handler = $this->translator->toHandler($command);

        return $this->app->make($handler)->handle($command);
    }
}
