<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeType\Domain;

use JasterTDC\Warriors\Shared\Domain\StringValueObject;

class AttributeType extends StringValueObject
{
    protected function __construct(string $value)
    {
        parent::__construct($value);
    }
}
