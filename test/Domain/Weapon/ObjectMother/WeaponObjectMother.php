<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\Weapon;

final class WeaponObjectMother
{
    public static function buildCustom(
        ?string $weaponTypePrimitive = null,
        ?string $namePrimitive = null,
        ?string $lastnamePrimitive = null,
        ?string $aliasPrimitive = null
    ): Weapon {
        return Weapon::buildFromPrimitives(
            $weaponTypePrimitive ?? WeaponTypeMother::SWORD,
            $namePrimitive ?? 'Lu',
            $lastnamePrimitive ?? 'Xun',
            $aliasPrimitive ?? 'Xiaomei'
        );
    }
}
