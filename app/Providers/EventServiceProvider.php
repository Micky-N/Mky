<?php

namespace App\Providers;

use App\Events\LogEvent;
use MkyCore\Abstracts\ServiceProvider;
use MkyCore\EventNotification\DatabaseNotificationListener;

class EventServiceProvider extends ServiceProvider
{
    
    /**
     * Register events and their listeners
     * @example app->addEvent(Event::class, ['action' => Listener::class]);
     * and register notification systems
     * @example app->addNotificationSystem('example', ExampleNotificationSystem::class);
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}