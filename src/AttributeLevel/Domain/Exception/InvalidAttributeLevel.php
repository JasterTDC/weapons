<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeLevel\Domain\Exception;

use Exception;

final class InvalidAttributeLevel extends Exception
{
    private const MSG_FROM_INVALID_ATTR_LEVEL = '%d is not a valid attribute level';

    public static function build(int $level): self
    {
        return new self(sprintf(self::MSG_FROM_INVALID_ATTR_LEVEL, $level));
    }
}
