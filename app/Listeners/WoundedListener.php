<?php

namespace App\Listeners;

use App\Interfaces\KnightEventInterface;

class WoundedListener extends TournamentListener
{
    /**
     * @param KnightEventInterface $event
     */
    public function handle(KnightEventInterface $event)
    {
        $this->teller->getWounded($event->getKnight(), $event->getDamage());
    }
}
