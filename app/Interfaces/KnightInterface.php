<?php

namespace App\Interfaces;

interface KnightInterface
{
    public function getName(): string;

    public function isAlive(): bool;

    public function getHealthPoints(): int;

    public function getNumber(): int;

    public function setDamage(int $damage): KnightInterface;

    public function hit(): int;

    public function wound(int $damage, KnightInterface $opponent);

    public function attack(KnightInterface $opponent): int;

}
