<?php

namespace App\Listeners;

use App\Events\BattleBeginEvent;

class BattleBeginListener extends TournamentListener
{
    /**
     * @param BattleBeginEvent $event
     */
    public function handle(BattleBeginEvent $event)
    {
        $this->teller->battleBegin($event->getBattle()->getKnights());
    }
}
