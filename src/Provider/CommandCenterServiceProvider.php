<?php

namespace VeeeneX\CommandCenter\Laravel;

use VeeeneX\CommandCenter\CommandApplicationInterface;
use VeeeneX\CommandCenter\CommandBus;
use VeeeneX\CommandCenter\CommandBusInterface;
use VeeeneX\CommandCenter\CommandTranslatorInterface;
use VeeeneX\CommandCenter\MainCommandBus;
use VeeeneX\CommandCenter\CommandTranslator;
use VeeeneX\CommandCenter\Application;
use VeeeneX\CommandCenter\CommandApplication;
use VeeeneX\CommandCenter\ValidationCommandBus;
use Illuminate\Support\ServiceProvider;

/**
 * Registers and bootstraps CommandCenter within the IoC.
 *
 * @package VeeeneX\CommandCenter
 * @author  Flyingfoxx <kyle@flyingfoxx.com>
 * @author  VeeeneX <veeenex@gmail.com>
 */
class CommandCenterServiceProvider extends ServiceProvider
{
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['command-center'];
    }

    public function register()
    {
        $this->registerApplication();
        $this->registerCommandTranslator();
        $this->registerCommandBus();
    }

    public function registerApplication()
    {
        $this->app->bind(CommandApplicationInterface::class, Application::class);
    }

    /**
     * Register the desired command translator binding.
     */
    private function registerCommandTranslator()
    {
        $this->app->bind(CommandTranslatorInterface::class, CommandTranslator::class);
    }

    /**
     * Register the desired command bus implementation.
     */
    private function registerCommandBus()
    {
        $main = $this->app->make(MainCommandBus::class);
        $application = $this->app->make(CommandApplicationInterface::class);
        $translator = $this->app->make(CommandTranslatorInterface::class);

        $this->app->instance(CommandBusInterface::class, new ValidationCommandBus($main, $application, $translator));
    }
}
