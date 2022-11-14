<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Domain\Weapon\Attribute\Factory;

use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Death;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Attack;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Frenzy;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Name\Courage;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeNameType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Rare;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Common;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Unique;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Exceptional;

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
                break;
        }

        return $attributeNameType;
    }
}
