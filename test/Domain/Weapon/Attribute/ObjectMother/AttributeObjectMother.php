<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother;

use JasterTDC\Warriors\Domain\Shared\Name\Name;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeLevel;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\AttributeType;
use JasterTDC\Warriors\Test\Domain\Shared\Name\ObjectMother\NameObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\AttributeType\ObjectMother\AttributeTypeObjectMother;

final class AttributeObjectMother
{
    public static function buildCustom(
        ?AttributeType $type = null,
        ?Name $name = null,
        ?AttributeLevel $level = null
    ): Attribute {
        return new Attribute(
            $type ?? AttributeTypeObjectMother::common(),
            $name ?? NameObjectMother::buildCustom(),
            $level ?? AttributeLevelObjectMother::buildCustom()
        );
    }
}
