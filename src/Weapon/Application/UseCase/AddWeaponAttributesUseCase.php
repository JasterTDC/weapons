<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Weapon\Application\UseCase;

use JasterTDC\Warriors\Weapon\Domain\Weapon;
use JasterTDC\Warriors\Attribute\Domain\Attribute;
use JasterTDC\Warriors\Weapon\Domain\WeaponAttributes;
use JasterTDC\Warriors\Weapon\Domain\Factory\WeaponAttributesFactory;

final class AddWeaponAttributesUseCase
{
    public function __invoke(Weapon $weapon, Attribute ...$attributes): WeaponAttributes
    {
        return WeaponAttributesFactory::build($weapon, ...$attributes);
    }
}
