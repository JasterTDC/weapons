<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\WeaponType;

use JasterTDC\Warriors\Domain\Shared\StringValueObject;

final class Axe extends StringValueObject
{
    public function __construct()
    {
        parent::__construct('axe');
    }
}
