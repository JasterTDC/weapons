<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute\Exception;

use Exception;

final class InvalidAttributeName extends Exception
{
    private const INVALID_NAME_MSG = '%s is not a valid attribute name';

    public static function build(string $attributeName): self
    {
        return new self(
            sprintf(self::INVALID_NAME_MSG, $attributeName)
        );
    }
}
