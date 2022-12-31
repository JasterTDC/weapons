<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Shared\Domain\Exception;

use Exception;

final class InvalidName extends Exception
{
    private const MSG_FROM_INVALID_NAME = '%s is not a valid name';

    public static function build(string $name): self
    {
        return new self(sprintf(self::MSG_FROM_INVALID_NAME, $name));
    }
}
