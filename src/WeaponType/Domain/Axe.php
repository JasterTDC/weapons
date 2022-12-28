<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\WeaponType\Domain;

use JasterTDC\Warriors\Shared\Domain\StringValueObject;

final class Axe extends WeaponType
{
    public function __construct()
    {
        parent::__construct('axe');
    }
}
