<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\WeaponType;

use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;

final class Sword extends WeaponType
{
    public function __construct()
    {
        parent::__construct('sword');
    }
}
