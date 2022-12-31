<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Weapon\Domain;

use JasterTDC\Warriors\Shared\Domain\Name;
use JasterTDC\Warriors\WeaponLevel\Domain\WeaponLevel;
use JasterTDC\Warriors\WeaponType\Domain\WeaponType;

final class Weapon
{
    public function __construct(
        private Name $name,
        private WeaponType $type,
        private WeaponLevel $level
    ) {
    }

    public function name(): string
    {
        return $this->name->value();
    }

    public function type(): string
    {
        return $this->type->value();
    }

    public function level(): int
    {
        return $this->level->value();
    }
}
