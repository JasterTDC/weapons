<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Weapon\Domain\Factory;

use JasterTDC\Warriors\Shared\Domain\Exception\InvalidLevel;
use JasterTDC\Warriors\Shared\Domain\Exception\InvalidName;
use JasterTDC\Warriors\Shared\Domain\Name;
use JasterTDC\Warriors\Weapon\Domain\Weapon;
use JasterTDC\Warriors\WeaponLevel\Domain\Exception\InvalidWeaponLevel;
use JasterTDC\Warriors\WeaponLevel\Domain\WeaponLevel;
use JasterTDC\Warriors\WeaponType\Domain\Exception\InvalidWeaponType;
use JasterTDC\Warriors\WeaponType\Domain\Factory\WeaponTypeFactory;

final class WeaponFactory
{
    /** @throws InvalidName|InvalidWeaponLevel|InvalidLevel|InvalidWeaponType */
    public static function build(
        string $primitiveName,
        string $primitiveType,
        int $primitiveLevel
    ): Weapon {
        $name = new Name($primitiveName);
        $level = new WeaponLevel($primitiveLevel);
        $type = WeaponTypeFactory::build($primitiveType);

        return new Weapon($name, $type, $level);
    }
}
