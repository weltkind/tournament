<?php

namespace App\Listeners;

use App\Interfaces\KnightEventInterface;

class WinListener extends TournamentListener
{
    /**
     * @param KnightEventInterface $event
     */
    public function handle(KnightEventInterface $event)
    {
        $this->teller->knightWin($event->getKnight());
    }
}
