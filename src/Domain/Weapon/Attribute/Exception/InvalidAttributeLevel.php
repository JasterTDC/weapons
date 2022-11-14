<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute\Exception;

use Exception;

final class InvalidAttributeLevel extends Exception
{
    private const INVALID_ATTRIBUTE_LEVEL_MSG = '%d is not a valid attribute level';

    public static function build(int $level): self
    {
        return new self(
            sprintf(self::INVALID_ATTRIBUTE_LEVEL_MSG, $level)
        );
    }
}
