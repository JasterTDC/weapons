<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Shared\Domain;

use JasterTDC\Warriors\Shared\Domain\Exception\InvalidName;

class Name extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    private function ensureIsValid(string $value): void
    {
        if (empty($value)) {
            throw InvalidName::build($value);
        }
    }
}
