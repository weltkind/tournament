<?php

namespace App\Kingdom;

use App\Interfaces\TreasuryInterface;

/**
 * Class Treasury
 * The treasury contains rare jewels and treasures. As possible think...
 * @package App\Kingdom
 */
class Treasury implements TreasuryInterface
{
    private const KEY      = 'app.rewards';

    /**
     * @return string
     */
    public function getReward():  string
    {
        $names = config(self::KEY);

        return $names[array_rand($names)];
    }
}
