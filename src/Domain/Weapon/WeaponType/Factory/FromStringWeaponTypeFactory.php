<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\WeaponType\Factory;

use JasterTDC\Warriors\Domain\Weapon\WeaponType\Axe;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\Dagger;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\Exception\InvalidWeaponType;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\Sword;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;

final class FromStringWeaponTypeFactory
{
    public static function buildFromPrimitive(string $weaponTypePrimitive): WeaponType
    {
        switch ($weaponTypePrimitive) {
            case 'axe':
                $weaponType = new Axe();
                break;
            case 'dagger':
                $weaponType = new Dagger();
                break;
            case 'sword':
                $weaponType = new Sword();
                break;
            default:
                throw InvalidWeaponType::buildFromWeaponType($weaponTypePrimitive);
        }

        return $weaponType;
    }
}
