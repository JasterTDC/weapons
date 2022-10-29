<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Shared\Name;

final class FullName
{
    private function __construct(
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

    public static function buildFromPrimitives(
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive
    ): self {
        $name = new Name($namePrimitive);
        $lastname = new Lastname($lastnamePrimitive);
        $alias = new Alias($aliasPrimitive);

        return new self($name, $lastname, $alias);
    }
}