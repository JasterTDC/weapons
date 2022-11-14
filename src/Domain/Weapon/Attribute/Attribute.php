<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute;

class Attribute
{
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
}
