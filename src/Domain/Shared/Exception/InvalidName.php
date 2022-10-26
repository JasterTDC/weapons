<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Exception;

use Exception;

final class InvalidName extends Exception
{
    private const MSG_FROM_MAXIMUM_CHARS_ALLOWED = '%s has more than the maximum allowed characters (14) or less than minimum (2)';

    public static function buildFromInvalidNumberOfCharacters(string $name): self
    {
        return new self(
            sprintf(self::MSG_FROM_MAXIMUM_CHARS_ALLOWED, $name)
        );
    }
}
