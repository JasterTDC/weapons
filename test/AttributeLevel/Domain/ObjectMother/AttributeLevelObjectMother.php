<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeLevel\Domain\ObjectMother;

use JasterTDC\Warriors\AttributeLevel\Domain\AttributeLevel;

final class AttributeLevelObjectMother
{
    public static function buildCustom(?int $primitiveLevel = null): AttributeLevel
    {
        return new AttributeLevel($primitiveLevel ?? 1);
    }
}
