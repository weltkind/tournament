<?php

namespace App\Kingdom\Item;

use App\Events\ItemEvent;
use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;
use App\Kingdom\Item;
use App\Kingdom\Item\StrategyPull\OffenseStrategyPull;

class MagicWand extends Item implements ItemInterface
{
    protected $title = 'Magic Wand';

    private   $strategy;

    public function __construct(KnightInterface $knight)
    {
        parent::__construct($knight);
        $this->strategy = $this->strategy = (new OffenseStrategyPull($this, $knight))->getStrategy();
    }

    public function use(int $hitPower, KnightInterface $opponent): int
    {
        if ($this->strategy->shouldUse($hitPower, $opponent)) {
            event(new ItemEvent($this->knight, $this));
            $hitPower = $hitPower * 2;
            $this->setUsed();
        }

        return $hitPower;
    }
}
