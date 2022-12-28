<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Shared\Domain\Exception;

use Exception;

final class InvalidLevel extends Exception
{
    private const MSG_FROM_INVALID_LEVEL = '%d is not a valid level';

    public static function buildFromLevel(int $level): self
    {
        return new self(sprintf(self::MSG_FROM_INVALID_LEVEL, $level));
    }
}
