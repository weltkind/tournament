<?php

namespace App\Listeners;

use App\Events\BeginEvent;

class BeginListener extends TournamentListener
{
    /**
     * @param BeginEvent $event
     */
    public function handle(BeginEvent $event)
    {
        $this->teller->begin();
    }
}
