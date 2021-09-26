<?php

namespace App\Kingdom\Item\Strategy;

use App\Interfaces\KnightInterface;
use App\Interfaces\UsageStrategyInterface;
use App\Kingdom\Item\Strategy;

/**
 * Class MaxDefence
 * Defence strategy means to block maximum damage
 * @package App\Kingdom\Item\Strategy
 */
class MaxDefence extends Strategy implements UsageStrategyInterface
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

        if ($damage >= max($this->cube)) {
            return true;
        }

        return false;
    }
}
