<?php

namespace App\Console\Commands;

use App\Kingdom\Majordomo;

trait AskWithValidation
{
    /**
     * @param string $message
     * @return mixed
     */
    public function askWithValidation(string $message)
    {
        $answer = $this->ask($message);

        $majordomo = new Majordomo($answer);

        if ($majordomo->isAllowed()) {
            return $answer;
        }

        $this->error($majordomo->whyNot());

        return $this->askWithValidation($message);
    }
}
