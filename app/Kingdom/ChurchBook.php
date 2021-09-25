<?php

namespace App\Kingdom;

use App\Interfaces\ChurchBookInterface;

/**
 * Class ChurchBook
 * Сontains the lineage of the knights. Get data from antiquity.
 * @package App\Kingdom
 */
class ChurchBook implements ChurchBookInterface
{
    private const TITLE_KEY      = 'app.dignities';

    private const NAME_KEY      = 'app.names';

    private const SOBRIQUET_KEY = 'app.sobriquets';

    /**
     * @return string
     */
    public function readName():  string
    {
        return implode(' ', [
            $this->getFromOldBooks(self::TITLE_KEY),
            $this->getFromOldBooks(self::NAME_KEY),
            $this->getFromOldBooks(self::SOBRIQUET_KEY)
        ]);
    }

    /**
     * @param string $key
     * @return string
     */
    private function getFromOldBooks(string $key): string
    {
        $names = config($key);

        return $names[array_rand($names)];
    }
}
