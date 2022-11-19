<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Exception\InvalidFuseAttribute;
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

    public function equalsNameType(Attribute $attribute): bool
    {
        return $this->nameType->equals($attribute->nameType());   
    } 

    public function equalsLevel(Attribute $attribute): bool
    {
        return $this->level->equals($attribute->level());
    }

    public function fuse(Attribute $attribute): Attribute
    {
        if ($attribute->isLevelLesserThan($this)) {
            return $this;
        }

        return new self($this->nameType, new AttributeLevel($this->levelValue() + 1));
    }

    private function nameType(): AttributeNameType
    {
        return $this->nameType;
    }

    private function level(): AttributeLevel
    {
        return $this->level;
    }

    private function levelValue(): int
    {
        return $this->level->value();
    }

    private function isLevelLesserThan(Attribute $attribute): bool
    {
        return $this->level->isLesserThan($attribute->level());
    }

    public static function buildFromPrimitives(string $primitiveName, int $primitiveLevel): self
    {
        $attributeNameType = FromStringAttributeNameTypeFactory::build($primitiveName);
        $level = new AttributeLevel($primitiveLevel);

        return new self($attributeNameType, $level);
    }
}
