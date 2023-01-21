<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Domain\Factory;

use JasterTDC\Warriors\Officer\Domain\BlueArmy;
use JasterTDC\Warriors\Officer\Domain\Exception\InvalidOfficerArmy;
use JasterTDC\Warriors\Officer\Domain\GreenArmy;
use JasterTDC\Warriors\Officer\Domain\OfficerArmy;
use JasterTDC\Warriors\Officer\Domain\RedArmy;
use JasterTDC\Warriors\Officer\Domain\YellowArmy;

final class OfficerArmyFactory
{
    public static function build(string $army): OfficerArmy
    {
        return match($army) {
            'blue' => new BlueArmy(),
            'green' => new GreenArmy(),
            'red' => new RedArmy(),
            'yellow' => new YellowArmy(),
            default => throw InvalidOfficerArmy::build($army)
        };
    }
}
