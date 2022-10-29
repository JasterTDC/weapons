<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\AttributeType\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\AttributeType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Common;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Exceptional;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Rare;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Unique;

final class AttributeTypeObjectMother
{
    public const COMMON = 'common';
    public const EXCEPTIONAL = 'exceptional';
    public const RARE = 'rare';
    public const UNIQUE = 'unique';

    public static function common(): AttributeType
    {
        return new Common();
    }

    public static function exceptional(): AttributeType
    {
        return new Exceptional();
    }

    public static function rare(): AttributeType
    {
        return new Rare();
    }

    public static function unique(): AttributeType
    {
        return new Unique();
    }
}
