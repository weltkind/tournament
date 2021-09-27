<?php

namespace App\Kingdom;

use App\Events\AllDiesEvent;
use App\Events\DieEvent;
use App\Events\Event;
use App\Events\WinEvent;
use App\Interfaces\CourtInterface;
use App\Interfaces\TournamentInterface;

/**
 * Class Tournament
 * That is. You can't stop tournament. Run only.
 * @package App\Kingdom
 */
class Tournament implements TournamentInterface
{
    /**
     * @var CourtInterface
     */
    private $court;

    /**
     * @param CourtInterface $court
     */
    public function __construct(CourtInterface $court)
    {
        $this->court = $court;
    }
    
    public function run()
    {
        while (!$this->court->isMoreThanOne()) {
            $battle = new Battle($this->court->getPair());
            foreach ($battle->run() as $fighter) {
                if (!$fighter->isAlive()) {
                    event(new DieEvent($fighter));
                    $this->court->bringAway($fighter);
                }
            }
        }

        if ($this->court->isEmpty()) {
            return event(new AllDiesEvent());
        }

        return event(new WinEvent($this->court->getLast()));
    }
}
