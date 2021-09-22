<?php

namespace App\Kingdom;

use App\Interfaces\KnightInterface;

/**
 * Class Knight
 * Knight entity with a very sad fate...
 * @package App\Kingdom
 */
class Knight implements KnightInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $healthPoints;

    /**
     * @var int
     */
    private $number;

    /**
     * @param string $name
     * @param int $healthPoints
     * @param int $number
     */
    public function __construct(string $name, int $healthPoints, int $number)
    {
        $this->name = $name;
        $this->healthPoints = $healthPoints;
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     *
     */
    public function getHealthPoints(): int
    {
        return $this->healthPoints;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $damage
     * @return KnightInterface
     */
    public function setDamage(int $damage): KnightInterface
    {
        $this->healthPoints = $this->healthPoints - $damage;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return $this->healthPoints > 0;
    }

    /**
     * @return int
     */
    public function hit(): int
    {
        $cube = config('app.cube');

        return $cube[array_rand($cube)];
    }
}
