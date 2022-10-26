<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Exception;

use Exception;

final class InvalidLastname extends Exception
{
    private const MSG_FROM_INVALID_LAST_NAME = '%s does not have minimum characters (Minimum: 2)';

    public static function build(string $value): self
    {
        return new self(
            sprintf(self::MSG_FROM_INVALID_LAST_NAME, $value)
        );
    }
}
