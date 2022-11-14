<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute;

use JasterTDC\Warriors\Domain\Shared\Name\Name;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\AttributeType;

class Attribute
{
    public function __construct(
        private AttributeType $type,
        private Name $name
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
