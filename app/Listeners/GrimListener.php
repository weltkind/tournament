<?php

namespace App\Listeners;
use App\Interfaces\KnightEventInterface;

class GrimListener extends TournamentListener
{
    /**
     * @param KnightEventInterface $event
     */
    public function handle(KnightEventInterface $event)
    {
        $this->teller->knightDie($event->getKnight());
    }
}
