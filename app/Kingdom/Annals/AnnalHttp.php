<?php

namespace App\Kingdom\Annals;

use App\Interfaces\AnnalInterface;
use App\Kingdom\Book;

/**
 * Class AnnalHttp
 * Output history to the book for http client
 * @package App\Kingdom
 */
class AnnalHttp implements AnnalInterface
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
       $this->writer->write($string);
   }
}
