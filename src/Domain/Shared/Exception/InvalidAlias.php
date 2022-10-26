<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Exception;

use Exception;

final class InvalidAlias extends Exception
{
    private const MSG_FROM_INVALID_NUMBER_OF_CHARACTERS = '%s does not have the right length (Minimum 4, Maximum 10)';

    public static function buildFromInvalidNumberOfCharacters(string $alias): self
    {
        return new self(
            sprintf(self::MSG_FROM_INVALID_NUMBER_OF_CHARACTERS, $alias)
        );
    }
}
