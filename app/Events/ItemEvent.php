<?php

namespace App\Events;

use App\Interfaces\ItemInterface;
use App\Interfaces\KnightEventInterface;
use App\Interfaces\KnightInterface;

class ItemEvent extends KnightEvent implements KnightEventInterface
{
    private $item;

    /**
     * @param KnightInterface $knight
     */
    public function __construct(KnightInterface $knight, ItemInterface $item)
    {
        $this->knight = $knight;
        $this->item = $item;
    }

    public function getItem()
    {
        return $this->item;
    }
}
