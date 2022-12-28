<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\WeaponType\Domain\Exception;

use Exception;

final class InvalidWeaponType extends Exception
{
    private const MSG_FROM_INVALID_WEAPON_TYPE = '%s is not a valid weapon type';

    public static function build(string $weaponType): self
    {
        return new self(sprintf(self::MSG_FROM_INVALID_WEAPON_TYPE, $weaponType));
    }
}
