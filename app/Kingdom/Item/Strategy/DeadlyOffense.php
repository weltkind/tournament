<?php

namespace App\Kingdom\Item\Strategy;

use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;
use App\Kingdom\Item\Strategy;

/**
 * Class DeadlyOffense
 * Cruel strategy for Magic Wand, means to kill weak opponent
 * @package App\Kingdom\Item\Strategy
 */
class DeadlyOffense extends Strategy implements UsageStrategyInterface
{
    /**
     * @param int $hitPower
     * @param KnightInterface $opponent
     * @return bool
     */
    public function shouldUse(int $hitPower, KnightInterface $opponent): bool
    {

        if ($this->item->isUsed()) {
            return false;
        }

        if ($opponent->getHealthPoints() <= $hitPower * 2) {
            return true;
        }

        return false;
    }
}
