<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\WeaponType\Domain;

final class Sword extends WeaponType
{
    public function __construct()
    {
        parent::__construct('sword');
    }
}
