<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute;

use JasterTDC\Warriors\Domain\Shared\Collection\Collection;

final class AttributeCollection extends Collection
{
    public function addAttribute(Attribute $attribute): void
    {
        if (!empty($this->getAttribute($attribute))) {
            return ;
        }
        $this->collection[] = $attribute;
        $this->collectionById[$attribute->name()] = $attribute;
    }

    public function hasAttribute(Attribute $attribute): bool
    {
        $selectedAttribute = $this->getAttribute($attribute);

        if (null === $selectedAttribute) {
            return false;
        }
        
        return $selectedAttribute->equalsNameType($attribute);
    }

    public function hasExactlyAttribute(Attribute $attribute): bool
    {
        $selectedAttribute = $this->getAttribute($attribute);

        if (null === $selectedAttribute) {
            return false;
        }
        
        return $selectedAttribute->equalsNameType($attribute) &&
            $selectedAttribute->equalsLevel($attribute);
    }

    private function getAttribute(Attribute $attribute): ?Attribute
    {
        if (!isset($this->collectionById[$attribute->name()])) {
            return null;
        }

        return $this->collectionById[$attribute->name()];
    }

    public function fuse(AttributeCollection $attributeCollection): AttributeCollection
    {
        $collection = new AttributeCollection();

        /** @var Attribute $attribute */
        foreach ($this->collection as $attribute) {
            if ($attributeCollection->hasAttribute($attribute)) {
                continue ;
            }

            $collection->addAttribute($attribute);
        }

        /** @var Attribute $attribute */
        foreach ($attributeCollection as $attribute) {
            if (!$this->hasAttribute($attribute)) {
                $collection->addAttribute($attribute);

                continue ;
            }

            $currentAttribute = $this->getAttribute($attribute);
            $fusedAttribute = $currentAttribute->fuse($attribute);

            $collection->addAttribute($fusedAttribute);
        }

        return $collection;
    }

    public static function buildFromPrimitives(array $primitiveAttributes): self
    {
        $collection = new self();

        foreach ($primitiveAttributes as $primitiveAttribute) {
            $collection->addAttribute(Attribute::buildFromPrimitives(
                $primitiveAttribute[Attribute::NAME],
                $primitiveAttribute[Attribute::LEVEL]
            ));
        }

        return $collection;
    }
}
