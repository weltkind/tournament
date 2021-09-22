<?php

namespace App\Listeners;

use App\Events\AllDiesEvent;

class TooGrimListener extends TournamentListener
{
    /**
     * @param AllDiesEvent $event
     */
    public function handle(AllDiesEvent $event)
    {
        $this->teller->allDies();
    }
}
