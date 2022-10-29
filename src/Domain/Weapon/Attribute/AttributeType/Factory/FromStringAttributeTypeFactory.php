<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Factory;

use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\AttributeType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Common;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Exception\InvalidAttributeType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Exceptional;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Rare;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Unique;

final class FromStringAttributeTypeFactory
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
