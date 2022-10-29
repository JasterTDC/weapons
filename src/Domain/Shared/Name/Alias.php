<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Name;

use JasterTDC\Warriors\Domain\Shared\Exception\InvalidAlias;
use JasterTDC\Warriors\Domain\Shared\StringValueObject;

final class Alias extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);
    }

    private function ensureIsValid(string $value): void
    {
        if (strlen($value) < 4 || strlen($value) > 10) {
            throw InvalidAlias::buildFromInvalidNumberOfCharacters($value);
        }
    }
}
