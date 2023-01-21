<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Domain\Factory;

use JasterTDC\Warriors\Officer\Domain\Officer;
use JasterTDC\Warriors\Officer\Domain\OfficerArmy;
use JasterTDC\Warriors\Officer\Domain\OfficerLevel;
use JasterTDC\Warriors\Shared\Domain\Name;

final class OfficerFactory
{
    public static function build(
        Name $name,
        OfficerArmy $army,
        OfficerLevel $level
    ): Officer {
        return new Officer(
            name: $name,
            army: $army,
            level: $level
        );
    }

    public static function buildFromPrimitives(
        string $primitiveName,
        string $primitiveArmy,
        int $primitiveLevel
    ): Officer {
        $name = new Name($primitiveName);
        $level = new OfficerLevel($primitiveLevel);
        $army = OfficerArmyFactory::build($primitiveArmy);

        return self::build(
            name: $name,
            army: $army,
            level: $level
        );
    }
}
