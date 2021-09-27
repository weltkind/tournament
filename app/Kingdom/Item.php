<?php

namespace App\Kingdom;

use App\Interfaces\ItemInterface;
use App\Interfaces\KnightInterface;

/**
 * Abstract Class Item
 * Contains common logic for all items.
 * @package App\Kingdom
 */
abstract class Item implements ItemInterface
{
    private $isUsed;

    protected $title;

    protected $knight;

    /**
     * @param KnightInterface $knight
     */
    public function __construct(KnightInterface $knight)
    {
        $this->knight = $knight;
        $this->isUsed = false;
    }

    /**
     * @return bool
     */
    public function isUsed(): bool
    {
        return $this->isUsed;
    }

    public function setUsed(): void
    {
        $this->isUsed = true;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $originalValue
     * @param KnightInterface $opponent
     * @return mixed
     */
    abstract function use(int $originalValue, KnightInterface $opponent);
}
