<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Weapon\Domain\Factory;

use JasterTDC\Warriors\Attribute\Domain\Attribute;
use JasterTDC\Warriors\Attribute\Domain\AttributeCollection;
use JasterTDC\Warriors\Weapon\Domain\Weapon;
use JasterTDC\Warriors\Weapon\Domain\WeaponAttributes;

final class WeaponAttributesFactory
{
    public static function build(Weapon $weapon, Attribute ...$attributes): WeaponAttributes
    {
        $collection = new AttributeCollection();
        $collection->addAttributes(...$attributes);

        return new WeaponAttributes($weapon, $collection);
    }
}