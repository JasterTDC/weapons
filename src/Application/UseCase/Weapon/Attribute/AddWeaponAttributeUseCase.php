<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Application\UseCase\Weapon\Attribute;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Weapon\Weapon;

final class AddWeaponAttributeUseCase
{
    public function handle(Weapon $weapon, Attribute $attribute): Weapon
    {
        $weapon->addAttribute($attribute);

        return $weapon;
    }
}
