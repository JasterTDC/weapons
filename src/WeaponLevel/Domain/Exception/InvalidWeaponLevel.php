<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\WeaponLevel\Domain\Exception;

use Exception;

final class InvalidWeaponLevel extends Exception
{
    private const MSG_FROM_INVALID = '%d is not a valid weapon level';

    public static function build(int $level): self
    {
        return new self(sprintf(self::MSG_FROM_INVALID, $level));
    }
}
