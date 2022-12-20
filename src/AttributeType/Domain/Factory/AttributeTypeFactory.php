<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\AttributeType\Domain\Factory;

use JasterTDC\Warriors\AttributeType\Domain\AttributeType;
use JasterTDC\Warriors\AttributeType\Domain\Common;
use JasterTDC\Warriors\AttributeType\Domain\Exception\InvalidAttributeType;
use JasterTDC\Warriors\AttributeType\Domain\Exceptional;
use JasterTDC\Warriors\AttributeType\Domain\Rare;
use JasterTDC\Warriors\AttributeType\Domain\Unique;

final class AttributeTypeFactory
{
    public static function build(string $attributeTypePrimitive): AttributeType
    {
        switch($attributeTypePrimitive) {
            case 'common':
                $attributeType = new Common();
                break;
            case 'rare':
                $attributeType = new Rare();
                break;
            case 'exceptional':
                $attributeType = new Exceptional();
                break;
            case 'unique':
                $attributeType = new Unique();
                break;
            default:
                throw InvalidAttributeType::buildFromInvalidAttributeType($attributeTypePrimitive);
        }

        return $attributeType;
    }
}
