<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Shared\Domain;

class IntegerValueObject
{
    public function __construct(private int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }

    public function equals(IntegerValueObject $intValueObject): bool
    {
        return $this->value === $intValueObject->value;
    }
}
