<?php

namespace App\Kingdom\Item\Strategy;

use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;
use App\Kingdom\Item\Strategy;

/**
 * Class MaxOffense
 * Offence strategy, means to bring maximum damage
 * @package App\Kingdom\Item\Strategy
 */
class MaxOffense extends Strategy implements UsageStrategyInterface
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

        if ($hitPower == max($this->cube) && $opponent->getHealthPoints() > $hitPower * 2) {
            return true;
        }

        return false;
    }
}
