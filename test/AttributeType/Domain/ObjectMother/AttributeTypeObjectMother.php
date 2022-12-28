<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeType\Domain\ObjectMother;

use JasterTDC\Warriors\AttributeType\Domain\AttributeType;
use JasterTDC\Warriors\AttributeType\Domain\Common;
use JasterTDC\Warriors\AttributeType\Domain\Rare;

final class AttributeTypeObjectMother
{
    public static function common(): AttributeType
    {
        return new Common();
    }

    public static function rare(): AttributeType
    {
        return new Rare();
    }
}
