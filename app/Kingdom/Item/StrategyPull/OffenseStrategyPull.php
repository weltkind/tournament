<?php

namespace App\Kingdom\Item\StrategyPull;

use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;
use App\Interfaces\StrategyPullInterface;
use App\Interfaces\UsageStrategyInterface;
use App\Kingdom\Item\Strategy\DeadlyOffense;
use App\Kingdom\Item\Strategy\MaxOffense;
use App\Kingdom\Item\StrategyPull;

class OffenseStrategyPull extends StrategyPull implements StrategyPullInterface
{
    /**
     * @var UsageStrategyInterface[]
     */
    private $pull;

    /**
     * @param ItemInterface $item
     * @param KnightInterface $knight
     */
    public function __construct(ItemInterface $item, KnightInterface $knight)
    {
        parent::__construct($item, $knight);
        $this->pull = [
            new DeadlyOffense($item, $knight),
            new MaxOffense($item, $knight)
        ];
    }

    /**
     * @return UsageStrategyInterface
     */
    public function getStrategy(): UsageStrategyInterface
    {
        return $this->pull[array_rand($this->pull)];
    }
}
