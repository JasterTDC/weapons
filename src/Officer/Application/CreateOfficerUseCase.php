<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Application;

use JasterTDC\Warriors\Officer\Domain\Factory\OfficerFactory;
use JasterTDC\Warriors\Officer\Domain\Officer;

final class CreateOfficerUseCase
{
    public function __invoke(
        string $name,
        string $army,
        int $level
    ): Officer {
        return OfficerFactory::buildFromPrimitives(
            primitiveName: $name,
            primitiveArmy: $army,
            primitiveLevel: $level
        );
    }
}
