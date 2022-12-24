<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeNameType\Domain\Factory;

use JasterTDC\Warriors\AttributeName\Domain\Exception\InvalidAttributeName;
use JasterTDC\Warriors\AttributeName\Domain\Fire;
use JasterTDC\Warriors\AttributeName\Domain\Light;
use JasterTDC\Warriors\AttributeName\Domain\Wind;
use JasterTDC\Warriors\AttributeNameType\Domain\AttributeNameType;
use JasterTDC\Warriors\AttributeType\Domain\Common;
use JasterTDC\Warriors\AttributeType\Domain\Rare;

final class AttributeNameTypeFactory
{
    /** @throws InvalidAttributeName */
    public static function build(string $name): AttributeNameType
    {
        return match($name) {
            'fire' => new AttributeNameType(new Fire(), new Common()),
            'wind' => new AttributeNameType(new Wind(), new Common()),
            'light' => new AttributeNameType(new Light(), new Rare()),
            default => throw InvalidAttributeName::build($name)
        };
    }
}
