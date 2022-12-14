<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeNameType\Domain\ObjectMother;

use JasterTDC\Warriors\AttributeName\Domain\AttributeName;
use JasterTDC\Warriors\AttributeType\Domain\AttributeType;
use JasterTDC\Warriors\AttributeNameType\Domain\AttributeNameType;
use JasterTDC\Warriors\Test\AttributeName\Domain\ObjectMother\AttributeNameObjectMother;
use JasterTDC\Warriors\Test\AttributeType\Domain\ObjectMother\AttributeTypeObjectMother;

final class AttributeNameTypeObjectMother
{
    public static function buildCustom(
        ?AttributeName $name = null,
        ?AttributeType $type = null
    ): AttributeNameType {
        return new AttributeNameType(
            $name ?? AttributeNameObjectMother::fire(),
            $type ?? AttributeTypeObjectMother::common()
        );
    }

    public static function fire(): AttributeNameType
    {
        return new AttributeNameType(
            AttributeNameObjectMother::fire(),
            AttributeTypeObjectMother::common()
        );
    }

    public static function wind(): AttributeNameType
    {
        return new AttributeNameType(
            AttributeNameObjectMother::wind(),
            AttributeTypeObjectMother::common()
        );
    }

    public static function light(): AttributeNameType
    {
        return new AttributeNameType(
            AttributeNameObjectMother::light(),
            AttributeTypeObjectMother::rare()
        );
    }
}
