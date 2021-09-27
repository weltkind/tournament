<?php

namespace App\Kingdom\Annal;

use App\Interfaces\AnnalInterface;
use App\Kingdom\Annal;
use Symfony\Component\Console\Output\ConsoleOutput;

/**
 * Class AnnalConsole
 * Output history to console
 * @package App\Kingdom
 */
class AnnalConsole extends Annal implements AnnalInterface
{
    /**
     * @var ConsoleOutput
     */
    private   $writer;

    protected $intonation;

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
        $this->writer->writeln('<fg=' . $this->getStyle() . '>' . $string . '</>');
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
                return "gray";
            case self::INTONATION_REWARD:
                return "yellow";
            case self::INTONATION_DIE:
                return "red";
            default:
                return "green";
        }
    }
}
