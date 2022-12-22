<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeName\Domain\ObjectMother;

use JasterTDC\Warriors\AttributeName\Domain\AttributeName;
use JasterTDC\Warriors\AttributeName\Domain\Fire;
use JasterTDC\Warriors\AttributeName\Domain\Wind;

final class AttributeNameObjectMother
{
    public static function wind(): AttributeName
    {
        return new Wind();
    }

    public static function fire(): AttributeName
    {
        return new Fire();
    }
}
