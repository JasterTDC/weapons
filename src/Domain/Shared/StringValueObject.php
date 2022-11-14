<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared;

abstract class StringValueObject
{
    public function __construct(
        private string $value
    ) {  
    }

    public function equals(StringValueObject $strValueObject): bool
    {
        return $this->value === $strValueObject->value();
    }

    public function value(): string
    {
        return $this->value;
    }
}
