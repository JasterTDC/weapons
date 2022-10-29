<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon;

use JasterTDC\Warriors\Domain\Shared\Name\FullName;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\Factory\FromStringWeaponTypeFactory;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;

final class Weapon
{
    private function __construct(
        private WeaponType $weaponType,
        private FullName $weaponName
    ) {
    }

    public function equalsWeaponType(WeaponType $weaponType): bool
    {
        return $this->weaponType->equals($weaponType);
    }

    public function name(): string
    {
        return $this->weaponName->name();
    }

    public function lastname(): string
    {
        return $this->weaponName->lastname();
    }

    public function alias(): string
    {
        return $this->weaponName->alias();
    }

    public static function buildFromPrimitives(
        string $weaponTypePrimitive,
        string $name,
        string $lastname,
        string $alias
    ): self {
        $weaponType = FromStringWeaponTypeFactory::buildFromPrimitive($weaponTypePrimitive);
        $fullname = FullName::buildFromPrimitives($name, $lastname, $alias);

        return new self($weaponType, $fullname);
    }
}
