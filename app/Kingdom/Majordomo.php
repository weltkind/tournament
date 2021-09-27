<?php

namespace App\Kingdom;

use App\Interfaces\MajordomoInterface;
use Illuminate\Support\Facades\Validator;

/**
 * Class Majordomo
 * Validator adapter. Arranges the tournament and serves the knights.
 * @package App\Kingdom
 */
class Majordomo implements MajordomoInterface
{
    private const VALIDATION_PREFIX = 'app.validation.amount.';

    private const PARAM_NAME        = 'amount';

    private $validator;

    /**
     * @param mixed $amount
     */
    public function __construct($amount)
    {
        $this->validator = Validator::make([
            self::PARAM_NAME => $amount,
        ], [
            self::PARAM_NAME => config(self::VALIDATION_PREFIX . 'rules'),
        ], config(self::VALIDATION_PREFIX . 'messages'));
    }

    /**
     * @return bool
     */
    public function isAllowed(): bool
    {
        return $this->validator->passes();
    }

    /**
     * @return string
     */
    public function whyNot(): string
    {
        return $this->validator->errors()->first();
    }
}
