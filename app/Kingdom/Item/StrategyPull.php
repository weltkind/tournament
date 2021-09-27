<?php

namespace App\Kingdom\Item;

use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;

/**
 * Abstract Class StrategyPull
 * Strategies pull for random selection
 * @package App\Kingdom\Item
 */
abstract class StrategyPull
{
    /**
     * @var ItemInterface
     */
    protected $item;

    /**
     * @var KnightInterface
     */
    protected $knight;

    /**
     * @param ItemInterface $item
     * @param KnightInterface $knight
     */
    public function __construct(ItemInterface $item, KnightInterface $knight)
    {
        $this->item = $item;
        $this->knight = $knight;
    }

    /**
     * @return UsageStrategyInterface
     */
    abstract public function getStrategy(): UsageStrategyInterface;
}
