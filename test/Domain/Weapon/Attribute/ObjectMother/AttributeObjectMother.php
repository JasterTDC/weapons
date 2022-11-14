<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeLevel;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeNameType;

final class AttributeObjectMother
{
    public static function buildCustom(
        ?AttributeNameType $nameType = null,
        ?AttributeLevel $level = null
    ): Attribute {
        return new Attribute(
            $nameType ?? AttributeNameTypeObjectMother::buildCustom(),
            $level ?? AttributeLevelObjectMother::buildCustom()
        );
    }
}
