<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Domain;

use JasterTDC\Warriors\Officer\Domain\Exception\InvalidOfficerLevel;
use JasterTDC\Warriors\Shared\Domain\Level;

final class OfficerLevel extends Level
{
    public function __construct(int $value)
    {
        $this->ensureIsValid($value);
        parent::__construct($value);   
    }

    private function ensureIsValid(int $value): void
    {
        if (50 < $value) {
            throw InvalidOfficerLevel::build($value);
        }
    }
}
