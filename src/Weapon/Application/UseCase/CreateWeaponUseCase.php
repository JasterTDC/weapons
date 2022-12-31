<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Weapon\Application\UseCase;

use JasterTDC\Warriors\Weapon\Domain\Factory\WeaponFactory;
use JasterTDC\Warriors\Weapon\Domain\Weapon;

final class CreateWeaponUseCase
{
    public function __invoke(string $name, string $type, int $level): Weapon
    {
        return WeaponFactory::build($name, $type, $level);
    }
}
