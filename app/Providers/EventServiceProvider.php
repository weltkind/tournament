<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\BeginEvent::class => [
            \App\Listeners\BeginListener::class,
        ],
        \App\Events\BattleBeginEvent::class => [
            \App\Listeners\BattleBeginListener::class,
        ],
        \App\Events\ArriveEvent::class => [
            \App\Listeners\WelcomeListener::class,
        ],
        \App\Events\WoundedEvent::class => [
            \App\Listeners\WoundedListener::class,
        ],
        \App\Events\DieEvent::class => [
            \App\Listeners\GrimListener::class,
        ],
        \App\Events\AllDiesEvent::class => [
            \App\Listeners\TooGrimListener::class,
        ],
        \App\Events\WinEvent::class => [
            \App\Listeners\WinListener::class,
        ],
        \App\Events\ItemEvent::class => [
            \App\Listeners\MagicListener::class,
        ]

    ];
}
