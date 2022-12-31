<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Attribute\Domain;

use JasterTDC\Warriors\Shared\Domain\Collection;

final class AttributeCollection extends Collection
{
    public function hasAttribute(Attribute $attribute): bool
    {
        return $this->exists($attribute->name());
    }

    public function getAttributeByName(string $name): ?Attribute
    {
        /** @var Attribute|null $attribute */
        $attribute = $this->getById($name);

        return $attribute;
    }

    public function addAttributes(Attribute ...$attributes): void
    {
        foreach ($attributes as $attribute) {
            $this->add($attribute, $attribute->name());
        }
    }
}
