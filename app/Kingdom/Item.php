<?php

namespace App\Kingdom;

use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;

abstract class Item implements ItemInterface
{
    private $isUsed;

    protected $title;

    protected $knight;

    public function __construct(KnightInterface $knight)
    {
        $this->knight = $knight;
        $this->isUsed = false;
    }

    public function isUsed(): bool
    {
        return $this->isUsed;
    }

    public function setUsed(): void
    {
        $this->isUsed = true;
    }

    public function getTitle()
    {
        return $this->title;
    }

    abstract function use(int $originalValue, KnightInterface $opponent);
}
