<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Level;

use JasterTDC\Warriors\Domain\Shared\IntegerValueObject;
use JasterTDC\Warriors\Domain\Shared\Level\Exception\InvalidLevel;

class Level extends IntegerValueObject
{
    public function __construct(int $primitiveLevel)
    {
        $this->ensureIsValid($primitiveLevel);
        parent::__construct($primitiveLevel);
    }

    private function ensureIsValid(int $primitiveLevel): void
    {
        if ($primitiveLevel <= 0) {
            throw InvalidLevel::build($primitiveLevel);
        }
    }
}
