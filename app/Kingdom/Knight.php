<?php

namespace App\Kingdom;

use App\Events\WoundedEvent;
use App\Interfaces\KnightInterface;
use App\Kingdom\Item\MagicShield;
use App\Kingdom\Item\MagicWand;

/**
 * Class Knight
 * Knight entity with a very sad fate...
 * @package App\Kingdom
 */
class Knight implements KnightInterface
{
    private const INITIAL_HEALTH = 100;

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
     * @var Sword
     */
    private $sword;

    /**
     * @var MagicShield
     */
    private $magicShield;

    /**
     * @var MagicWand
     */
    private $magicWand;

    /**
     * @param string $name
     * @param int $number
     */
    public function __construct(string $name, int $number)
    {
        $this->name = $name;
        $this->number = $number;
        $this->healthPoints = self::INITIAL_HEALTH;
        $this->sword = new Sword();
        $this->magicShield = new MagicShield($this);
        $this->magicWand = new MagicWand($this);
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
        event(new WoundedEvent($this, $damage));

        return $this;
    }

    /**
     * @return int
     */
    public function hit(): int
    {
        return $this->sword->hit();
    }

    /**
     * @return bool
     */
    public function isAlive(): bool
    {
        return $this->healthPoints > 0;
    }

    /**
     * @param int $damage
     * @param KnightInterface $opponent
     */
    public function wound(int $damage, KnightInterface $opponent)
    {
        $damage = $this->magicShield->use($damage, $opponent);
        $this->setDamage($damage);
    }

    /**
     * @param KnightInterface $opponent
     * @return int
     */
    public function attack(KnightInterface $opponent): int
    {
        return $this->magicWand->use($this->hit(), $opponent);
    }
}
