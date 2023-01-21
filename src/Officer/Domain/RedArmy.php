<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Officer\Domain;

final class RedArmy extends OfficerArmy
{
    public function __construct()
    {
        parent::__construct('red');
    }
}
