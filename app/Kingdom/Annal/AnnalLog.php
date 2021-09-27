<?php

namespace App\Kingdom\Annal;

use App\Interfaces\AnnalInterface;
use App\Kingdom\Annal;
use Illuminate\Support\Facades\Log;

/**
 * Class Messanger
 * Kings factory
 * @package App\Kingdom
 */
class AnnalLog extends Annal implements AnnalInterface
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
