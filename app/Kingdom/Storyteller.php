<?php

namespace App\Kingdom;

use App\Interfaces\AnnalInterface;
use App\Interfaces\ItemInterface;
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
        $this->tell('Messengers have been sent for ' . $amount . ' knights...');
    }

    /**
     * @param KnightInterface $knight
     */
    public function knightDie(KnightInterface $knight): void
    {
        $this->tell($knight->getName() . ' died valiantly', Annal::INTONATION_DIE);
    }

    /**
     * @param KnightInterface $knight
     */
    public function knightWin(KnightInterface $knight): void
    {
        $this->tell($knight->getName() . ' victoriously won and was rewarded by the King ...  ',
            Annal::INTONATION_GRAND);
        $this->tell('with '. $this->treasury->getReward(), Annal::INTONATION_REWARD);
    }

    public function allDies(): void
    {
        $this->tell('All knights die in the battle. The King is crying out loud...
        He ordered to pick up their stuff and put it to the treasury.', Annal::INTONATION_DIE);
    }

    /**
     * @param KnightInterface $knight
     */
    public function knightArrive(KnightInterface $knight): void
    {
        $this->tell($knight->getName() . ' arrived to the royal court', Annal::INTONATION_GRAND);
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

        $this->tell(implode(' vs ', $names), Annal::INTONATION_GRAND);
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
     * @param KnightInterface $knight
     * @param ItemInterface $item
     */
    public function magicUsed(KnightInterface $knight, ItemInterface $item): void
    {
        $this->tell($knight->getName() . ' used ' . $item->getTitle() . '!', Annal::INTONATION_MAGIC);
    }

    /**
     * @param string $string
     * @param string $intonation
     */
    private function tell(string $string, string $intonation = Annal::INTONATION_REGULAR)
    {
        foreach ($this->annals as $annal) {
            $annal->setIntonation($intonation)->info($string);
        }
    }
}
