<?php

namespace App\Interfaces;

interface AnnalInterface
{
    public function info(string $string);

    public function setIntonation(string $intonation): AnnalInterface;
}
