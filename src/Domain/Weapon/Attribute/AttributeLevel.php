<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute;

use JasterTDC\Warriors\Domain\Shared\Level\Level;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Exception\InvalidAttributeLevel;

final class AttributeLevel extends Level
{
    public function __construct(int $primitiveLevel)
    {
        $this->ensureAttributeLevelIsValid($primitiveLevel);
        parent::__construct($primitiveLevel);
    }

    private function ensureAttributeLevelIsValid(int $primitiveLevel): void
    {
        if ($primitiveLevel > 20) {
            throw InvalidAttributeLevel::build($primitiveLevel);
        }
    }
}
