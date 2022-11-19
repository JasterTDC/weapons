<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Exception;

use Exception;

final class InvalidFuseWeaponType extends Exception
{
    private const INVALID_WEAPON_TYPE_MSG = '%s is not the same as %s. Only weapons from the same type can be fused';

    public static function build(
        string $originalWeaponType,
        string $secondaryWeaponType
    ): self {
        return new self(
            sprintf(self::INVALID_WEAPON_TYPE_MSG, $originalWeaponType, $secondaryWeaponType)
        );
    }
}
