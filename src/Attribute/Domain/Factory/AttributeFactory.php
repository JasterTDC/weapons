<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Attribute\Domain\Factory;

use JasterTDC\Warriors\Attribute\Domain\Attribute;
use JasterTDC\Warriors\AttributeLevel\Domain\AttributeLevel;
use JasterTDC\Warriors\Shared\Domain\Exception\InvalidLevel;
use JasterTDC\Warriors\AttributeLevel\Domain\Exception\InvalidAttributeLevel;
use JasterTDC\Warriors\AttributeNameType\Domain\Factory\AttributeNameTypeFactory;

final class AttributeFactory
{
    /** @throws InvalidAttributeName|InvalidAttributeLevel|InvalidLevel */
    public static function build(string $primitiveName, int $primitiveLevel): Attribute
    {
        $nameType = AttributeNameTypeFactory::build($primitiveName);
        $level = new AttributeLevel($primitiveLevel);

        return new Attribute($nameType, $level);
    }
}
