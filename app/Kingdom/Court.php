<?php

namespace App\Kingdom;

use App\Interfaces\CourtInterface;
use App\Interfaces\KnightInterface;

/**
 * Class Court
 * Knights repository. Knights are staying here and drink some beer between a battles
 * @package App\Kingdom
 */
class Court implements CourtInterface
{
    /**
     * @var KnightInterface[]
     */
    private $knights;

    /**
     * @param KnightInterface[]
     */
    public function __construct($knights)
    {
        $this->knights = $knights;
    }

    /**
     * @param KnightInterface $knight
     */
    public function bringAway(KnightInterface $knight): void
    {
        unset($this->knights[$knight->getNumber()]);
    }

    /**
     * @return KnightInterface[]
     */
    public function getPair(): array
    {
        $fighterNumbers = array_rand($this->knights, 2);

        return [$this->knights[$fighterNumbers[0]], $this->knights[$fighterNumbers[1]]];
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return count($this->knights) == 0;
    }

    /**
     * @return bool
     */
    public function isMoreThanOne(): bool
    {
        return count($this->knights) <= 1;
    }

    /**
     * @return KnightInterface
     */
    public function getLast(): KnightInterface
    {
        return end($this->knights);
    }
}
