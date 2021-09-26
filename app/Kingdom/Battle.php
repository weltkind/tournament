<?php

namespace App\Kingdom;

use App\Events\BattleBeginEvent;
use App\Interfaces\BattleInterface;
use App\Interfaces\KnightInterface;

/**
 * Class Battle
 * Operates knight during the round
 * @package App\Kingdom
 */
class Battle implements BattleInterface
{
    /**
     * @var KnightInterface[]
     */
    private $knights;

    /**
     * @param KnightInterface[] $knights
     */
    public function __construct(array $knights)
    {
        $this->knights = $knights;
    }

    /**
     * @return KnightInterface[]
     */
    public function getKnights(): array
    {
        return $this->knights;
    }

    /**
     * @param KnightInterface $knight
     * @return KnightInterface
     */
    public function getOpponent(KnightInterface $knight): KnightInterface
    {
        foreach ($this->knights as $opponent) {
            if ($opponent->getNumber() != $knight->getNumber()) {
                return $opponent;
            }
        }
    }

    /**
     * @return KnightInterface[]
     */
    public function run(): array
    {
        event(new BattleBeginEvent($this));

        foreach ($this->knights as $knight) {
            $this->round($knight);
        }

        return $this->knights;
    }

    /**
     * @param KnightInterface $knight
     */
    private function round(KnightInterface $knight): void
    {
        $opponent = $this->getOpponent($knight);
        $damage = $opponent->attack($knight);
        $knight->wound($damage, $opponent);
    }
}
