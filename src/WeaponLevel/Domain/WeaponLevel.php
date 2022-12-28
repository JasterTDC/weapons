<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\WeaponLevel\Domain;

use JasterTDC\Warriors\Shared\Domain\Level;
use JasterTDC\Warriors\WeaponLevel\Domain\Exception\InvalidWeaponLevel;

final class WeaponLevel extends Level
{
    public function __construct(int $value)
    {
        $this->ensureLevelIsValid($value);
        parent::__construct($value);
    }

    private function ensureLevelIsValid(int $value): void
    {
        if ($value > 100) {
            throw InvalidWeaponLevel::build($value);
        }
    }
}
