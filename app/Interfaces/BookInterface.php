<?php

namespace App\Interfaces;

interface BookInterface
{
    public function write(string $string): void;

    public function read(): string;
}
