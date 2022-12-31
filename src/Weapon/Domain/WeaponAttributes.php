<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Weapon\Domain;

use JasterTDC\Warriors\Attribute\Domain\Attribute;
use JasterTDC\Warriors\Attribute\Domain\AttributeCollection;

final class WeaponAttributes
{
    public function __construct(
        private Weapon $weapon,
        private AttributeCollection $attributes
    ) {
    }

    public function weapon(): Weapon
    {
        return $this->weapon;
    }

    public function attributes(): AttributeCollection
    {
        return $this->attributes;
    }

    public function totalAttributes(): int
    {
        return $this->attributes->count();
    }

    public function hasAttribute(Attribute $attribute): bool
    {
        return $this->attributes->hasAttribute($attribute);
    }

    public function getAttributeByName(string $name): ?Attribute
    {
        return $this->attributes->getAttributeByName($name);
    }
}
