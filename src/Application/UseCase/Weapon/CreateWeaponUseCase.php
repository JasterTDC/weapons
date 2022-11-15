<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Application\UseCase\Weapon;

use JasterTDC\Warriors\Domain\Weapon\Weapon;

final class CreateWeaponUseCase
{
    public function handle(
        string $primitiveWeaponType,
        string $primitiveName,
        string $lastName,
        string $alias,
        array $primitiveAttributes
    ): Weapon {
        return Weapon::buildFromPrimitives(
            $primitiveWeaponType,
            $primitiveName,
            $lastName,
            $alias,
            $primitiveAttributes
        );
    }
}
