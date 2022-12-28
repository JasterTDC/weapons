<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeName\Domain\ObjectMother;

use JasterTDC\Warriors\AttributeName\Domain\AttributeName;
use JasterTDC\Warriors\AttributeName\Domain\Fire;
use JasterTDC\Warriors\AttributeName\Domain\Light;
use JasterTDC\Warriors\AttributeName\Domain\Wind;

final class AttributeNameObjectMother
{
    public const FIRE = 'fire';
    public const LIGHT = 'light';
    public const WIND = 'wind';

    public static function wind(): AttributeName
    {
        return new Wind();
    }

    public static function fire(): AttributeName
    {
        return new Fire();
    }

    public static function light(): AttributeName
    {
        return new Light();
    }
}
