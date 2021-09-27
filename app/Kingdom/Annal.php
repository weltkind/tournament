<?php

namespace App\Kingdom;

use App\Interfaces\AnnalInterface;

/**
 * Abstract Class Annal
 * Contains intonation logic
 * @package App\Kingdom
 */
abstract class Annal implements AnnalInterface
{
    public const INTONATION_REGULAR = 'regular';

    public const INTONATION_MAGIC   = 'magic';

    public const INTONATION_DIE     = 'die';

    public const INTONATION_GRAND     = 'grand';

    public const INTONATION_REWARD  = 'reward';

    /**
     * @var string
     */
    protected $intonation;

    /**
     * @param string $intonation
     * @return AnnalInterface
     */
    public function setIntonation(string $intonation): AnnalInterface
    {
        if ($this->IsAllowed($intonation)) {
            $this->intonation = $intonation;
        }

        return $this;
    }

    /**
     * @param string $intonation
     * @return bool
     */
    protected function IsAllowed(string $intonation): bool
    {
        $allowed = [self::INTONATION_REGULAR, self::INTONATION_MAGIC, self::INTONATION_DIE, self::INTONATION_GRAND,
            self::INTONATION_REWARD];

        return in_array($intonation, $allowed);
    }
}
