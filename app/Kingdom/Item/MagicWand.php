<?php

namespace App\Kingdom\Item;

use App\Events\ItemEvent;
use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;
use App\Kingdom\Item;
use App\Kingdom\Item\StrategyPull\OffenseStrategyPull;

/**
 * Class MagicWand
 * A magic wand allows a knight, to double the damage, the opponent gets in the duel. This item can be used only once
 * in a game.
 * @package App\Kingdom\Item
 */
class MagicWand extends Item implements ItemInterface
{
    /**
     * @var string
     */
    protected $title = 'Magic Wand';

    /**
     * @var UsageStrategyInterface
     */
    private $strategy;

    /**
     * @param KnightInterface $knight
     */
    public function __construct(KnightInterface $knight)
    {
        parent::__construct($knight);
        $this->strategy = $this->strategy = (new OffenseStrategyPull($this, $knight))->getStrategy();
    }

    /**
     * @param int $hitPower
     * @param KnightInterface $opponent
     * @return int
     */
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
