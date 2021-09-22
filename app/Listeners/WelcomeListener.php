<?php

namespace App\Listeners;

use App\Interfaces\KnightEventInterface;

class WelcomeListener extends TournamentListener
{

    public function handle(KnightEventInterface $event)
    {
        $this->teller->knightArrive($event->getKnight());
    }
}
