<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\WeaponType\Domain\ObjectMother;

use JasterTDC\Warriors\WeaponType\Domain\Axe;
use JasterTDC\Warriors\WeaponType\Domain\Sword;
use JasterTDC\Warriors\WeaponType\Domain\WeaponType;

final class WeaponTypeObjectMother
{
    public const AXE = 'axe';
    public const SWORD = 'sword';

    public static function axe(): WeaponType
    {
        return new Axe();
    }

    public static function sword(): WeaponType
    {
        return new Sword();
    }
}
