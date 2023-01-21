<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Domain;

use JasterTDC\Warriors\Shared\Domain\Name;

final class Officer
{
    public function __construct(
        private Name $name,
        private OfficerArmy $army,
        private OfficerLevel $level
    ) {
    }
}