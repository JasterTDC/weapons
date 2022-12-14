<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeName\Domain\Factory;

use JasterTDC\Warriors\AttributeName\Domain\Wind;
use JasterTDC\Warriors\AttributeName\Domain\AttributeName;
use JasterTDC\Warriors\AttributeName\Domain\Exception\InvalidAttributeName;
use JasterTDC\Warriors\AttributeName\Domain\Fire;
use JasterTDC\Warriors\AttributeName\Domain\Light;

final class AttributeNameFactory
{
    public static function build(string $primitiveName): AttributeName
    {
        return match($primitiveName) {
            'wind' => new Wind(),
            'fire' => new Fire(),
            'light' => new Light(),
            default => throw InvalidAttributeName::build($primitiveName)
        };
    }
}
