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

    protected function nameType(): AttributeNameType
    {
        return $this->nameType;
    }

    protected function level(): AttributeLevel
    {
        return $this->level;
    }

    public function equalsNameType(Attribute $attribute): bool
    {
        return $this->nameType->equals($attribute->nameType());   
    } 

    public function equalsLevel(Attribute $attribute): bool
    {
        return $this->level->equals($attribute->level());
    }

    public static function buildFromPrimitives(string $primitiveName, int $primitiveLevel): self
    {
        $attributeNameType = FromStringAttributeNameTypeFactory::build($primitiveName);
        $level = new AttributeLevel($primitiveLevel);

        return new self($attributeNameType, $level);
    }
}
