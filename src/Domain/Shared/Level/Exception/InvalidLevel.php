<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Level\Exception;

use Exception;

final class InvalidLevel extends Exception
{
    private const INVALID_LEVEL_MSG = '%d is not a valid level';

    public static function build(int $level): self
    {
        return new self(
            sprintf(self::INVALID_LEVEL_MSG, $level)
        );
    }
}
