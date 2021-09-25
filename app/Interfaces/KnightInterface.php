<?php

namespace App\Interfaces;

interface KnightInterface
{
    public function getName(): string;

    public function setDamage(int $damage): self;

    public function isAlive(): bool;

    public function getHealthPoints(): int;

    public function getNumber(): int;

    public function hit(): int;

}
