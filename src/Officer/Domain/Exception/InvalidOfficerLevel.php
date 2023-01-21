<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Domain\Exception;

use Exception;

final class InvalidOfficerLevel extends Exception
{
    private const MSG_FROM_INVALID_OFFICER_LEVEL = '%d is not a valid officer level';

    public static function build(int $value): self
    {
        return new self(sprintf(self::MSG_FROM_INVALID_OFFICER_LEVEL, $value));
    }
}
