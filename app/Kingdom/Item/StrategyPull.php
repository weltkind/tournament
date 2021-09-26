<?php

namespace App\Kingdom\Item;

use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;

abstract class StrategyPull
{
    protected $item;

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

    abstract public function getStrategy(): UsageStrategyInterface;
}
