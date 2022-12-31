<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\WeaponLevel\Domain\ObjectMother;

use JasterTDC\Warriors\WeaponLevel\Domain\WeaponLevel;

final class WeaponLevelObjectMother
{
    public static function buildCustom(int $primitiveLevel): WeaponLevel
    {
        return new WeaponLevel($primitiveLevel);
    }
}
