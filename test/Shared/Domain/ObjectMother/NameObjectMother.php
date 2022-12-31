<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Shared\Domain\ObjectMother;

use JasterTDC\Warriors\Shared\Domain\Name;

final class NameObjectMother
{
    public static function buildCustom(string $primitiveName): Name
    {
        return new Name($primitiveName);
    }
}
