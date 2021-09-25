<?php

namespace App\Interfaces;

interface BattleInterface
{
    public function getKnights(): array;

    public function getOpponent(KnightInterface $knight): KnightInterface;

    public function run(): array;
}
