<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeLevel;

final class AttributeLevelObjectMother
{
    public static function buildCustom(?int $primitiveLevel = null): AttributeLevel
    {
        return new AttributeLevel($primitiveLevel ?? 1);
    }
}
