<?php

namespace App\Interfaces;

interface StorytellerInterface
{
    public function begin(): void;

    public function messengersSent(int $amount): void;

    public function knightDie(KnightInterface $knight): void;

    public function knightWin(KnightInterface $knight): void;

    public function allDies(): void;

    public function knightArrive(KnightInterface $knight): void;

    public function battleBegin(array $knights): void;

    public function getWounded(KnightInterface $knight, int $damage): void;

}
