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

    /**
     * @param Log $writer
     */
   public function __construct(Log $writer)
   {
       $this->writer = $writer;
   }

    /**
     * @param string $string
     */
   public function info(string $string)
   {
       $this->writer::info($string);
   }
}
