<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\Name\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Attack;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\AttributeName;

final class AttributeNameObjectMother
{
    public static function attack(): AttributeName
    {
        return new Attack();
    }
}
