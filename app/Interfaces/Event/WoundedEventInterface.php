<?php

namespace App\Interfaces\Event;

use App\Interfaces\EventInterface;

interface WoundedEventInterface extends EventInterface
{
    public function getDamage(): int;
}
