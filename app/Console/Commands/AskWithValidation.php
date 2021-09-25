<?php

namespace App\Console\Commands;

use App\Kingdom\Majordomo;

trait AskWithValidation
{
    public function askWithValidation(
        string $message)
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
