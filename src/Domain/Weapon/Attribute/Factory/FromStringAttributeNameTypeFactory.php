<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute\Factory;

use JasterTDC\Warriors\AttributeType\Domain\Common;
use JasterTDC\Warriors\AttributeType\Domain\Exceptional;
use JasterTDC\Warriors\AttributeType\Domain\Rare;
use JasterTDC\Warriors\AttributeType\Domain\Unique;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Death;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Attack;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Frenzy;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Courage;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeNameType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Exception\InvalidAttributeName;

final class FromStringAttributeNameTypeFactory
{
    public static function build(string $primitiveAttributeName): AttributeNameType
    {
        $cleanedAttributeName = strtolower($primitiveAttributeName);

        switch ($cleanedAttributeName) {
            case 'attack':
                $attributeNameType = new AttributeNameType(
                    new Attack(),
                    new Common()
                );
                break;
            case 'courage':
                $attributeNameType = new AttributeNameType(
                    new Courage(),
                    new Exceptional()
                );
                break;
            case 'death':
                $attributeNameType = new AttributeNameType(
                    new Death(),
                    new Rare()
                );
                break;
            case 'frenzy':
                $attributeNameType = new AttributeNameType(
                    new Frenzy(),
                    new Unique()
                );
                break;
            default:
                throw InvalidAttributeName::build($cleanedAttributeName);
                break;
        }

        return $attributeNameType;
    }
}
