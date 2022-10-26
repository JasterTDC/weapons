<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Name;

use JasterTDC\Warriors\Domain\Shared\Exception\InvalidName;
use JasterTDC\Warriors\Domain\Shared\StringValueObject;

final class Name extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureNameIsValid($value);
        parent::__construct($value);
    }

    private function ensureNameIsValid(string $name): void
    {
        if (strlen($name) < 2 || strlen($name) > 14) {
            throw InvalidName::buildFromInvalidNumberOfCharacters($name);
        }
    }
}
