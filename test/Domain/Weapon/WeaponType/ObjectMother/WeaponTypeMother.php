<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\WeaponType\Axe;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\Dagger;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\Sword;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;

final class WeaponTypeMother
{
    public const AXE = 'axe';
    public const DAGGER = 'dagger';
    public const SWORD = 'sword';

    public static function buildAxe(): WeaponType
    {
        return new Axe();
    }

    public static function buildDagger(): WeaponType
    {
        return new Dagger();
    }

    public static function buildSword(): WeaponType
    {
        return new Sword();
    }
}
