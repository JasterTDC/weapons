<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Application\UseCase\Weapon;

use JasterTDC\Warriors\Domain\Weapon\Weapon;

final class FuseWeaponsUseCase
{
    public function handle(
        Weapon $originalWeapon,
        Weapon $secondaryWeapon
    ): Weapon {
        return $originalWeapon->fuse($secondaryWeapon);
    }
}
