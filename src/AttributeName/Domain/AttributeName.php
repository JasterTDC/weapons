<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeName\Domain;

use JasterTDC\Warriors\Shared\Domain\StringValueObject;

class AttributeName extends StringValueObject
{
    protected function __construct(string $value)
    {
        parent::__construct($value);
    }
}
