<?php

namespace App\Events;

use App\Interfaces\Event\WoundedEventInterface;
use App\Interfaces\KnightEventInterface;
use App\Interfaces\KnightInterface;

class WoundedEvent extends KnightEvent implements KnightEventInterface, WoundedEventInterface
{
    /**
     * @var int
     */
    private $damage;

    /**
     * @param KnightInterface $knight
     * @param int $damage
     */
    public function __construct(KnightInterface $knight, int $damage)
    {
        $this->knight = $knight;
        $this->damage = $damage;
    }

    /**
     * @return int
     */
    public function getDamage(): int
    {
        return $this->damage;
    }
}
