<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeNameType\Domain;

use JasterTDC\Warriors\AttributeName\Domain\AttributeName;
use JasterTDC\Warriors\AttributeType\Domain\AttributeType;

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

    public function type(): string
    {
        return $this->type->value();
    }
}
