<?php

namespace App\Kingdom\Item;

use App\Events\ItemEvent;
use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;
use App\Kingdom\Item;
use App\Kingdom\Item\StrategyPull\DefenceStrategyPull;

/**
 * Class MagicShield
 * A magic shield allows the knight, to avoid life point loss in a duel. If the knight uses the shield in a duel,
 * all damage will be redirected to the opponent
 * @package App\Kingdom\Item
 */
class MagicShield extends Item implements ItemInterface
{
    /**
     * @var string
     */
    protected $title = 'Magic Shield';

    /**
     * @var UsageStrategyInterface
     */
    private   $strategy;

    /**
     * @param KnightInterface $knight
     */
    public function __construct(KnightInterface $knight)
    {
        parent::__construct($knight);
        $this->strategy = (new DefenceStrategyPull($this, $knight))->getStrategy();
    }

    /**
     * @param int $damage
     * @param KnightInterface $opponent
     * @return int
     */
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
