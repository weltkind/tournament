<?php

namespace App\Interfaces;

interface StrategyPullInterface
{
    public function getStrategy(): UsageStrategyInterface;
}
