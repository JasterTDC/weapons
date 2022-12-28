<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeType\Domain\Factory;

use JasterTDC\Warriors\AttributeType\Domain\AttributeType;
use JasterTDC\Warriors\AttributeType\Domain\Common;
use JasterTDC\Warriors\AttributeType\Domain\Exception\InvalidAttributeType;
use JasterTDC\Warriors\AttributeType\Domain\Rare;

final class AttributeTypeFactory
{
    public static function build(string $primitiveType): AttributeType
    {
        return match($primitiveType) {
            'common' => new Common(),
            'rare' => new Rare(),
            default => throw InvalidAttributeType::build($primitiveType)
        };
    }
}
