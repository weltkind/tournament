<?php

namespace App\Interfaces;

interface MajordomoInterface
{
    public function isAllowed(): bool;

    public function whyNot(): string;
}
