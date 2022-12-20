<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\AttributeType\Domain;

final class Unique extends AttributeType
{
    public function __construct()
    {
        parent::__construct('unique');
    }
}
