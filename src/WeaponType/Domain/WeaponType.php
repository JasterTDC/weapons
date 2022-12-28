<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\WeaponType\Domain;

use JasterTDC\Warriors\Shared\Domain\StringValueObject;

class WeaponType extends StringValueObject
{
    protected function __construct(string $value)
    {
        parent::__construct($value);
    }
}
