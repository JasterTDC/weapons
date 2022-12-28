<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Shared\Domain;

class StringValueObject
{
    public function __construct(private string $value)
    {   
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    public function equals(StringValueObject $strObj): bool
    {
        return $this->value === $strObj->value;
    }
}
