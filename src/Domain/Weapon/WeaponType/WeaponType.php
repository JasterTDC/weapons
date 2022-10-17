<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\WeaponType;

use JasterTDC\Warriors\Domain\Shared\StringValueObject;

class WeaponType extends StringValueObject
{
    protected function __construct(private string $value)
    {
    }
}
