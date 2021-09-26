<?php

namespace App\Interfaces;

interface UsageStrategyInterface
{
    public function shouldUse(int $originalValue, KnightInterface $opponent): bool;

}
