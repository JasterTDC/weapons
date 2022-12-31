<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Weapon\Domain\ObjectMother;

use JasterTDC\Warriors\Attribute\Domain\AttributeCollection;
use JasterTDC\Warriors\Weapon\Domain\Weapon;
use JasterTDC\Warriors\Weapon\Domain\WeaponAttributes;

final class WeaponAttributesObjectMother
{
    public static function buildCustom(Weapon $weapon, AttributeCollection $attributes): WeaponAttributes
    {
        return new WeaponAttributes($weapon, $attributes);
    }
}
