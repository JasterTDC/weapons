<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute\Name;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\AttributeName;

final class Death extends AttributeName
{
    public function __construct()
    {
        parent::__construct('death');
    }
}
