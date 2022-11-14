<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Collection;

abstract class Collection
{
    public function __construct(
        private array $collection = [],
        private array $collectionById = []
    ){
    }
}
