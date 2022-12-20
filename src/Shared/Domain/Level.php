<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Shared\Domain;

use JasterTDC\Warriors\Shared\Domain\Exception\InvalidLevel;

class Level extends IntegerValueObject
{
    /** @throws InvalidLevel */
    public function __construct(int $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    /** @throws InvalidLevel */
    private function ensureIsValid(int $value): void
    {
        if ($value <= 0) {
            throw InvalidLevel::buildFromLevel($value);
        }
    }
}
