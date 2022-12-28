<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\WeaponType\Domain\Factory;

use JasterTDC\Warriors\WeaponType\Domain\Axe;
use JasterTDC\Warriors\WeaponType\Domain\Sword;
use JasterTDC\Warriors\WeaponType\Domain\WeaponType;
use JasterTDC\Warriors\WeaponType\Domain\Exception\InvalidWeaponType;

final class WeaponTypeFactory
{
    public static function build(string $primitiveType): WeaponType
    {
        return match($primitiveType) {
            'axe' => new Axe(),
            'sword' => new Sword(),
            default => throw InvalidWeaponType::build($primitiveType)
        };
    }
}
