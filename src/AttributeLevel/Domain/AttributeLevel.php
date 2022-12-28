<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeLevel\Domain;

use JasterTDC\Warriors\AttributeLevel\Domain\Exception\InvalidAttributeLevel;
use JasterTDC\Warriors\Shared\Domain\Level;

final class AttributeLevel extends Level
{
    public function __construct(int $value)
    {
        $this->ensureIsValidAttributeLevel($value);
        parent::__construct($value);
    }

    private function ensureIsValidAttributeLevel(int $value): void
    {
        if (20 < $value) {
            throw InvalidAttributeLevel::build($value);
        }
    }
}
