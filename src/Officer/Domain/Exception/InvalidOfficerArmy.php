<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Domain\Exception;

use Exception;

final class InvalidOfficerArmy extends Exception
{
    private const MSG_FROM_INVALID_ARMY = '%s is not a valid army';

    public static function build(string $army): self
    {
        return new self(sprintf(self::MSG_FROM_INVALID_ARMY, $army));
    }
}