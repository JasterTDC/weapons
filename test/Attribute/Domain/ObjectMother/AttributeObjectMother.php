<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\Attribute\Domain\ObjectMother;

use JasterTDC\Warriors\Attribute\Domain\Attribute;
use JasterTDC\Warriors\AttributeLevel\Domain\AttributeLevel;
use JasterTDC\Warriors\AttributeNameType\Domain\AttributeNameType;
use JasterTDC\Warriors\Test\AttributeLevel\Domain\ObjectMother\AttributeLevelObjectMother;
use JasterTDC\Warriors\Test\AttributeNameType\Domain\ObjectMother\AttributeNameTypeObjectMother;

final class AttributeObjectMother
{
    public static function buildCustom(
        ?AttributeNameType $attributeNameType = null,
        ?AttributeLevel $level = null
    ): Attribute {
        return new Attribute(
            $attributeNameType ?? AttributeNameTypeObjectMother::buildCustom(),
            $level ?? AttributeLevelObjectMother::buildCustom()
        );
    }
}