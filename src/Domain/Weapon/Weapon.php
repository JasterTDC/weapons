<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon;

use JasterTDC\Warriors\Domain\Shared\Name\FullName;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeCollection;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\Factory\FromStringWeaponTypeFactory;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;

final class Weapon
{
    private function __construct(
        private WeaponType $weaponType,
        private FullName $weaponName,
        private AttributeCollection $attributeCollection
    ) {
    }

    public function equalsWeaponType(WeaponType $weaponType): bool
    {
        return $this->weaponType->equals($weaponType);
    }

    public function name(): string
    {
        return $this->weaponName->name();
    }

    public function lastname(): string
    {
        return $this->weaponName->lastname();
    }

    public function alias(): string
    {
        return $this->weaponName->alias();
    }

    public function addAttribute(Attribute $attribute): void
    {
        $this->attributeCollection->addAttribute($attribute);
    }

    public function hasAttribute(Attribute $attribute): bool
    {
        return $this->attributeCollection->hasAttribute($attribute);
    }

    public static function buildFromPrimitives(
        string $weaponTypePrimitive,
        string $name,
        string $lastname,
        string $alias,
        array $primitiveAttributes
    ): self {
        $weaponType = FromStringWeaponTypeFactory::buildFromPrimitive($weaponTypePrimitive);
        $fullname = FullName::buildFromPrimitives($name, $lastname, $alias);
        $attributeCollection = AttributeCollection::buildFromPrimitives($primitiveAttributes);

        return new self($weaponType, $fullname, $attributeCollection);
    }
}
