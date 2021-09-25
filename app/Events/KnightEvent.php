<?php

namespace App\Events;

use App\Interfaces\KnightEventInterface;
use App\Interfaces\KnightInterface;

abstract class KnightEvent extends Event implements KnightEventInterface
{
    /**
     * @var KnightInterface
     */
    protected $knight;

    /**
     * @param KnightInterface $knight
     */
    public function __construct(KnightInterface $knight)
    {
        $this->knight = $knight;
    }

    /**
     * @return KnightInterface
     */
    public function getKnight(): KnightInterface
    {
       return $this->knight;
    }
}
