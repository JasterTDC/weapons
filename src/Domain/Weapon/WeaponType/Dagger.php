<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\WeaponType;

final class Dagger extends WeaponType
{
    public function __construct()
    {
        parent::__construct('dagger');
    }
}
