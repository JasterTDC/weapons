<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute;

use JasterTDC\Warriors\Domain\Shared\Collection\Collection;

final class AttributeCollection extends Collection
{
    public function addAttribute(Attribute $attribute): void
    {
        $this->collection[] = $attribute;
        $this->collectionById[$attribute->name()] = $attribute;
    }

    public function hasAttribute(Attribute $attribute): bool
    {
        return isset($this->collectionById[$attribute->name()]);
    }
}
