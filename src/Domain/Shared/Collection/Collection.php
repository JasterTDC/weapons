<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Collection;

use ArrayIterator;
use IteratorAggregate;
use Traversable;

abstract class Collection implements IteratorAggregate
{
    public function __construct(
        protected array $collection = [],
        protected array $collectionById = []
    ){
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->collection);
    }

    public function count(): int
    {
        return count($this->collection);
    }
}
