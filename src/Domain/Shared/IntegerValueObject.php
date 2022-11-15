<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared;

abstract class IntegerValueObject
{
    public function __construct(
        private int $value
    ) {  
    }

    public function equals(IntegerValueObject $integerValueObject): bool
    {
        return $this->value === $integerValueObject->value();
    }

    private function value(): int
    {
        return $this->value;
    }
}
