<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Shared\Name\ObjectMother;

use JasterTDC\Warriors\Domain\Shared\Name\Name;

final class NameObjectMother
{
    public static function buildCustom(?string $primitiveName = null): Name
    {
        return new Name($primitiveName ?? 'Liu');
    }
}
