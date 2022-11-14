<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Factory\FromStringAttributeNameTypeFactory;

class Attribute
{
    public const NAME = 'name';
    public const LEVEL = 'level';

    public function __construct(
        private AttributeNameType $nameType,
        private AttributeLevel $level
    ) {  
    }

    public function name(): string
    {
        return $this->nameType->name();
    }

    public function type(): string
    {
        return $this->nameType->type();
    }

    public function level(): int
    {
        return $this->level->value();
    }

    public static function buildFromPrimitives(string $primitiveName, int $primitiveLevel): self
    {
        $attributeNameType = FromStringAttributeNameTypeFactory::build($primitiveName);
        $level = new AttributeLevel($primitiveLevel);

        return new self($attributeNameType, $level);
    }
}
