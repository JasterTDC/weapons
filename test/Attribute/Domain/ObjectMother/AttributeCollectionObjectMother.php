<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Attribute\Domain\ObjectMother;

use JasterTDC\Warriors\Attribute\Domain\Attribute;
use JasterTDC\Warriors\Attribute\Domain\AttributeCollection;

final class AttributeCollectionObjectMother
{
    public static function buildCustom(Attribute ...$attributes): AttributeCollection
    {
        $collection = new AttributeCollection();
        $collection->addAttributes(...$attributes);

        return $collection;
    }
}
