<?php

declare(strict_types=1);

use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;

final class Sword extends WeaponType
{
    public function __construct()
    {
        parent::__construct('sword');
    }
}
