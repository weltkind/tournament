<?php

namespace App\Kingdom\Item;

use App\Events\ItemEvent;
use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;
use App\Kingdom\Item;
use App\Kingdom\Item\StrategyPull\DefenceStrategyPull;

class MagicShield extends Item implements ItemInterface
{
    protected $title = 'Magic Shield';

    private   $strategy;

    public function __construct(KnightInterface $knight)
    {
        parent::__construct($knight);
        $this->strategy = (new DefenceStrategyPull($this, $knight))->getStrategy();
    }

    public function use(int $damage, KnightInterface $opponent): int
    {
        if ($this->strategy->shouldUse($damage, $opponent)) {
            event(new ItemEvent($this->knight, $this));

            $opponent->setDamage($damage);
            $this->setUsed();
            $damage = 0;
        }

        return $damage;
    }
}
