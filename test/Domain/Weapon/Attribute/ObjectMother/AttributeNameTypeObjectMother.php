<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeNameType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\AttributeType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\AttributeName;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\AttributeType\ObjectMother\AttributeTypeObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\Name\ObjectMother\AttributeNameObjectMother;

final class AttributeNameTypeObjectMother
{
    public static function buildCustom(
        ?AttributeName $name = null,
        ?AttributeType $type = null
    ): AttributeNameType {
        return new AttributeNameType(
            $name ?? AttributeNameObjectMother::attack(),
            $type ?? AttributeTypeObjectMother::common()
        );
    }
}
