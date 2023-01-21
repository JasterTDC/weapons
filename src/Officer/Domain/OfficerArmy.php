<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Domain;

use JasterTDC\Warriors\Shared\Domain\StringValueObject;

class OfficerArmy extends StringValueObject
{
    protected function __construct(string $value)
    {
        parent::__construct($value);
    }
}
