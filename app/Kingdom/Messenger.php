<?php

namespace App\Kingdom;

use App\Events\ArriveEvent;
use App\Interfaces\MessengerInterface;

/**
 * Class Messenger
 * Kings factory. Invites knights to the court using old church lineage book.
 * @package App\Kingdom
 */
class Messenger implements MessengerInterface
{
    /**
     * @var int
     */
    private $amount;

    /**
     * @var ChurchBook
     */
    private $churchBook;

    /**
     * @param int $amount
     * @param ChurchBook $churchBook
     */
    public function __construct(int $amount, ChurchBook $churchBook)
    {
        $this->amount = $amount;
        $this->churchBook = $churchBook;
    }

    /**
     * @return array
     */
    public function invite(): array
    {
        $knights = [];
        for ($i = 0; $i < $this->amount; $i++) {
            $knight = new Knight($this->churchBook->readName(), $i);
            event(new ArriveEvent($knight));
            $knights[] = $knight;
        }

        return $knights;
    }
}
