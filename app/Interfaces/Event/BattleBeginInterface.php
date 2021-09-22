<?php

namespace App\Interfaces\Event;

use App\Interfaces\BattleInterface;
use App\Interfaces\EventInterface;

interface BattleBeginInterface extends EventInterface
{
    public function getBattle(): BattleInterface;
}
