<?php

namespace App\Listeners;

use App\Kingdom\Storyteller;

abstract class TournamentListener
{
    /**
     * @var Storyteller
     */
    protected $teller;

    /**
     * @param Storyteller $teller
     */
    public function __construct(Storyteller $teller)
    {
        $this->teller = $teller;
    }
}
