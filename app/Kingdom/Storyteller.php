<?php

namespace App\Kingdom;

use App\Interfaces\AnnalInterface;
use App\Interfaces\KnightInterface;
use App\Interfaces\StorytellerInterface;

/**
 * Class Storyteller
 * Event Handler. Your humble servant, who telling you this story and write in into history annals.
 * @package App\Kingdom
 */
class Storyteller implements StorytellerInterface
{
    /**
     * @var AnnalInterface[]
     */
    private $annals;

    /**
     * @var Treasury
     */
    private $treasury;

    /**
     * @param AnnalInterface ...$annals
     */
    public function __construct(AnnalInterface ...$annals)
    {
        $this->annals = $annals;
        $this->treasury = new Treasury();
    }

    public function begin(): void
    {
        $this->tell('One day the King got bored... Why not host a tournament?');
    }

    /**
     * @param int $amount
     */
    public function messengersSent(int $amount): void
    {
        $this->tell('Messengers were sent for ' . $amount . ' knights...');
    }

    /**
     * @param KnightInterface $knight
     */
    public function knightDie(KnightInterface $knight): void
    {
        $this->tell($knight->getName() . ' died valiantly');
    }

    /**
     * @param KnightInterface $knight
     */
    public function knightWin(KnightInterface $knight): void
    {
        $this->tell($knight->getName() . ' victoriously win and was rewarded by the king ... with '
            .$this->treasury->getReward());
    }

    public function allDies(): void
    {
        $this->tell('All knights dies in the battle. The king is crying out loud... And ordered to take their property to the treasury.');
    }

    /**
     * @param KnightInterface $knight
     */
    public function knightArrive(KnightInterface $knight): void
    {
        $this->tell($knight->getName() . ' arrived to the court');
    }

    /**
     * @param array $knights
     */
    public function battleBegin(array $knights): void
    {
        $names = [];
        foreach ($knights as $knight) {
            $names[] = $knight->getName() . ' (' . $knight->getHealthPoints() . ' hp)';
        }

        $this->tell(implode(' vs ', $names));
    }

    /**
     * @param KnightInterface $knight
     * @param int $damage
     */
    public function getWounded(KnightInterface $knight, int $damage): void
    {
        $this->tell($knight->getName() . ' got wounded ' . $damage . 'hp');
    }

    /**
     * @param string $string
     */
    private function tell(string $string)
    {
        foreach ($this->annals as $annal) {
            $annal->info($string);
        }
    }
}
