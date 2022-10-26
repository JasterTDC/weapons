<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Name;

final class FullName
{
    public function __construct(
        private Name $name,
        private Lastname $lastname,
        private Alias $alias
    ) {
    }

    public function name(): string
    {
        return $this->name->value();
    }

    public function lastname(): string
    {
        return $this->lastname->value();
    }

    public function alias(): string
    {
        return $this->alias->value();
    }
}