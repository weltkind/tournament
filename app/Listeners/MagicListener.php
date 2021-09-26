<?php

namespace App\Listeners;

use App\Interfaces\KnightEventInterface;

class MagicListener extends TournamentListener
{
    /**
     * @param KnightEventInterface $event
     */
    public function handle(KnightEventInterface $event)
    {
        $this->teller->magicUsed($event->getKnight(), $event->getItem());
    }
}
