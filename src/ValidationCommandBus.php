<?php

namespace VeeeneX\CommandCenter;

/**
 * Transports commands to their respective validators.
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
class ValidationCommandBus implements CommandBusInterface
{
    /**
     * The CommandCenter command bus.
     *
     * @var CommandBusInterface
     */
    protected $bus;

    /**
     * The CommandCenter application.
     *
     * @var Application
     */
    protected $app;

    /**
     * The CommandCenter translator.
     *
     * @var CommandTranslatorInterface
     */
    protected $translator;

    /**
     * Create a new CommandCenter validation command bus instance.
     *
     * @param CommandBusInterface $bus
     * @param CommandApplicationInterface $app
     * @param CommandTranslatorInterface $translator
     */
    public function __construct(
        CommandBusInterface $bus,
        CommandApplicationInterface $app,
        CommandTranslatorInterface $translator
    ) {
        $this->bus = $bus;
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
        $validator = $this->translator->toValidator($command);

        if (class_exists($validator)) {
            $this->app->make($validator)->validate($command);
        }

        return $this->bus->execute($command);
    }
}
