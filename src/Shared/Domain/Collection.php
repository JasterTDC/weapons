<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Shared\Domain;

abstract class Collection
{
    /**
     * @param array<int, mixed> $collection
     * @param array<string, mixed> $collectionById
     */
    public function __construct(
        private array $collection = [],
        private array $collectionById = []
    ) {
    }

    protected function add(mixed $item, ?string $id = null): void
    {
        $this->collection[] = $item;
        
        if (!empty($id)) {
            $this->collectionById[$id] = $item;
        }
    }

    protected function exists(string $id): bool
    {
        return isset($this->collectionById[$id]);
    }

    protected function getById(string $id): mixed
    {
        if (!$this->exists($id)) {
            return null;
        }

        return $this->collectionById[$id];
    }

    public function count(): int
    {
        return count($this->collection);
    }
}
