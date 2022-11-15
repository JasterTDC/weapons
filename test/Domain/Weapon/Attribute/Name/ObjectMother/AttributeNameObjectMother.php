<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\Name\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Attack;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\AttributeName;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Courage;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Death;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Frenzy;

final class AttributeNameObjectMother
{
    public const ATTACK = 'attack';
    public const COURAGE = 'courage';
    public const DEATH = 'death';
    public const FRENZY = 'frenzy';

    public static function attack(): AttributeName
    {
        return new Attack();
    }

    public static function courage(): AttributeName
    {
        return new Courage();
    }

    public static function death(): AttributeName
    {
        return new Death();
    }

    public static function frenzy(): AttributeName
    {
        return new Frenzy();
    }
}
