<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Weapon\Domain\ObjectMother;

use JasterTDC\Warriors\Shared\Domain\Name;
use JasterTDC\Warriors\Weapon\Domain\Weapon;
use JasterTDC\Warriors\WeaponLevel\Domain\WeaponLevel;
use JasterTDC\Warriors\WeaponType\Domain\WeaponType;

final class WeaponObjectMother
{
    public static function buildCustom(
        Name $name,
        WeaponType $type,
        WeaponLevel $level
    ): Weapon {
        return new Weapon($name, $type, $level);
    }
}
