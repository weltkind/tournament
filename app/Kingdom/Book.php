<?php

namespace App\Kingdom;

use App\Interfaces\BookInterface;

/**
 * Class Book
 * Converts Http annals and uses for output them in a browser
 * @package App\Kingdom
 */
class Book implements BookInterface
{
    /**
     * @var array
     */
    private $content = [];

    /**
     * @param string $string
     */
    public function write(string $string): void
    {
        $this->content[] = $string;
    }

    /**
     * @return string
     */
    public function read(): string
    {
        return implode('<br>', $this->content);
    }
}
