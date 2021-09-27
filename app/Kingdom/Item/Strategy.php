<?php

namespace App\Kingdom\Item;

use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;

/**
 * Abstract Class Strategy
 * Contains common logic for all  strategies
 * @package App\Kingdom\Item
 */
abstract class Strategy implements UsageStrategyInterface
{
    private const KEY = 'app.cube';

    /**
     * @var ItemInterface
     */
    protected $item;

    /**
     * @var KnightInterface
     */
    protected $knight;

    /**
     * @var array
     */
    protected $cube;

    /**
     * @param ItemInterface $item
     * @param KnightInterface $knight
     */
    public function __construct(ItemInterface $item, KnightInterface $knight)
    {
        $this->item = $item;
        $this->knight = $knight;
        $this->cube = config(self::KEY);
    }

    /**
     * @param int $originalValue
     * @param KnightInterface $opponent
     * @return mixed
     */
    abstract public function shouldUse(int $originalValue, KnightInterface $opponent): bool;
}
