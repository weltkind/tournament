<?php

namespace App\Interfaces;

interface ItemInterface
{
    public function isUsed(): bool;

    public function setUsed(): void;

    public function use(int $originalValue, KnightInterface $opponent);
}
