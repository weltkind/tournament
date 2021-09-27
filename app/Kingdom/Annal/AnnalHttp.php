<?php

namespace App\Kingdom\Annal;

use App\Interfaces\AnnalInterface;
use App\Kingdom\Annal;
use App\Kingdom\Book;

/**
 * Class AnnalHttp
 * Output history to the book for http client
 * @package App\Kingdom
 */
class AnnalHttp extends Annal implements AnnalInterface
{
    /**
     * @var Book
     */
    private $writer;

    /**
     * @param Book $writer
     */
   public function __construct(Book $writer)
   {
       $this->writer = $writer;
   }

    /**
     * @param string $string
     */
   public function info(string $string)
   {
       $this->writer->write('<span style="color:'.$this->getStyle().'">'.$string.'</span>');
   }

    /**
     * TODO: move to separate class
     * @return string
     */
    protected function getStyle(): string
    {
        switch ($this->intonation) {
            case self::INTONATION_MAGIC;
                return "blue";
            case self::INTONATION_GRAND:
                return "green";
            case self::INTONATION_REWARD:
                return "orange";
            case self::INTONATION_DIE:
                return "red";
            default:
                return "black";
        }
    }
}
