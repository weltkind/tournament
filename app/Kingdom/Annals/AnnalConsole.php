<?php

namespace App\Kingdom\Annals;

use App\Interfaces\AnnalInterface;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class AnnalConsole
 * Output history to console
 * @package App\Kingdom
 */
class AnnalConsole implements AnnalInterface
{
    /**
     * @var ConsoleOutput
     */
    private $writer;

    /**
     * @param ConsoleOutput $writer
     */
   public function __construct(ConsoleOutput $writer)
   {
       $this->writer = $writer;
   }

    /**
     * @param string $string
     */
   public function info(string $string)
   {
       $this->writer->writeln('<info>'.$string.'</info>');
   }
}
