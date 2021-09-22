<?php

namespace App\Kingdom\Annals;

use App\Interfaces\AnnalInterface;
use Illuminate\Support\Facades\Log;

/**
 * Class Messanger
 * Kings factory
 * @package App\Kingdom
 */
class AnnalLog implements AnnalInterface
{
   private $writer;

   public function __construct(Log $writer)
   {
       $this->writer = $writer;
   }

   public function info(string $string)
   {
       $this->writer::info($string);
   }
}
