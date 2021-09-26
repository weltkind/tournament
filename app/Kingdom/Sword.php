<?php

namespace App\Kingdom;

use App\Interfaces\WeaponInterface;

class Sword implements WeaponInterface
{
    private const KEY = 'app.cube';

    /**
     * @var array
     */
    private $cube;

    public function __construct()
    {
        $this->cube = config(self::KEY);
    }

    /**
     * @return int
     */
    public function hit(): int
    {
        return $this->cube[array_rand($this->cube)];
    }
}
