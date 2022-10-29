<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType;

final class Rare extends AttributeType
{
    public function __construct()
    {
        parent::__construct('rare');
    }
}
