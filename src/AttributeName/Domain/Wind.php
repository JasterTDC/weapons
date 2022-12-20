<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\AttributeName\Domain;

use JasterTDC\Warriors\AttributeName\Domain\AttributeName;

final class Wind extends AttributeName
{
    public function __construct()
    {
        parent::__construct('wind');
    }
}
