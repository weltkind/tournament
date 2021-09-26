<?php

namespace App\Kingdom\Item\Strategy;

use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;
use App\Kingdom\Item\Strategy;

/**
 * Class LastTimeDefence
 * Defence strategy, means use shield to save own life
 * @package App\Kingdom\Item\Strategy
 */
class LastTimeDefence extends Strategy implements UsageStrategyInterface
{
    /**
     * @param int $damage
     * @param KnightInterface $opponent
     * @return bool
     */
    public function shouldUse(int $damage, KnightInterface $opponent): bool
    {
        if ($this->item->isUsed()) {
            return false;
        }

        if ($this->knight->getHealthPoints() < $damage) {
            return true;
        }

        return false;
    }
}
