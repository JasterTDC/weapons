<?php

namespace JasterTDC\Warriors\Domain\Weapon\WeaponType\Exception;

use Exception;

final class InvalidWeaponType extends Exception
{
    private const MSG_FROM_INVALID_WEAPON_TYPE = '%s is not a valid weapon type';

    public static function buildFromWeaponType(string $weaponType): self
    {
        return new self(
            sprintf(self::MSG_FROM_INVALID_WEAPON_TYPE, $weaponType)
        );
    }
}
