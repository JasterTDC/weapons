<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute;

use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\AttributeType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\AttributeName;

final class AttributeNameType
{
    public function __construct(
        private AttributeName $name,
        private AttributeType $type
    ) {
    }

    public function name(): string
    {
        return $this->name->value();
    }

    private function type(): string
    {
        return $this->type->value();
    }

    public function equals(AttributeNameType $nameType): bool
    {
        return $nameType->name() === $this->name() &&
            $nameType->type() === $this->type();
    }
}
