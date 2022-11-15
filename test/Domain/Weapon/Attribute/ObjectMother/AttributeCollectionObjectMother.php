<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeCollection;

final class AttributeCollectionObjectMother
{
    public static function buildCustom(Attribute ...$attributes): AttributeCollection
    {
        $collection = new AttributeCollection();

        foreach ($attributes as $attribute) {
            $collection->addAttribute($attribute);
        }

        return $collection;
    }

    public static function buildEmpty(): AttributeCollection
    {
        return new AttributeCollection();
    }
}
