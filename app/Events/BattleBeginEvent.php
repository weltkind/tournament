<?php

namespace App\Events;

use App\Interfaces\BattleInterface;
use App\Interfaces\Event\BattleBeginInterface;

class BattleBeginEvent extends Event implements BattleBeginInterface
{
    /**
     * @var BattleInterface
     */
    protected $battle;

    /**
     * @param BattleInterface $battle
     */
    public function __construct(BattleInterface $battle)
    {
        $this->battle = $battle;
    }

    /**
     * @return BattleInterface
     */
    public function getBattle(): BattleInterface
    {
       return $this->battle;
    }
}
