<?php

namespace App\Interfaces;

interface CourtInterface
{
    public function bringAway(KnightInterface $knight): void;

    public function getPair(): array;

    public function isEmpty(): bool;

    public function isMoreThanOne(): bool;

    public function getLast(): KnightInterface;
}
