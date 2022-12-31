<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Weapon\Application\UseCase;

use PHPUnit\Framework\TestCase;
use JasterTDC\Warriors\Weapon\Domain\Weapon;
use JasterTDC\Warriors\Attribute\Domain\Attribute;
use JasterTDC\Warriors\Weapon\Domain\WeaponAttributes;
use JasterTDC\Warriors\Test\Shared\Domain\ObjectMother\NameObjectMother;
use JasterTDC\Warriors\Test\Weapon\Domain\ObjectMother\WeaponObjectMother;
use JasterTDC\Warriors\Test\Attribute\Domain\ObjectMother\AttributeObjectMother;
use JasterTDC\Warriors\Test\WeaponType\Domain\ObjectMother\WeaponTypeObjectMother;
use JasterTDC\Warriors\Test\Weapon\Domain\ObjectMother\WeaponAttributesObjectMother;
use JasterTDC\Warriors\Test\WeaponLevel\Domain\ObjectMother\WeaponLevelObjectMother;
use JasterTDC\Warriors\Test\Attribute\Domain\ObjectMother\AttributeCollectionObjectMother;
use JasterTDC\Warriors\Test\AttributeLevel\Domain\ObjectMother\AttributeLevelObjectMother;
use JasterTDC\Warriors\Test\AttributeNameType\Domain\ObjectMother\AttributeNameTypeObjectMother;

final class AddWeaponAttributesUseCaseTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenHappyPathThenReturnValid(
        WeaponAttributes $expected,
        Weapon $weapon,
        Attribute ...$attributes
    ): void {
        $useCase = new AddWeaponAttributesUseCase();

        $actual = $useCase->__invoke($weapon, ...$attributes);

        $this->assertEquals($expected->weapon(), $actual->weapon());
        $this->assertEquals($expected->attributes(), $actual->attributes());
        $this->assertEquals($expected->totalAttributes(), $actual->totalAttributes());

        foreach ($attributes as $attribute) {
            $actualAttribute = $actual->getAttributeByName($attribute->name());

            $this->assertTrue($actual->hasAttribute($attribute));
            $this->assertEquals($attribute->name(), $actualAttribute->name());
            $this->assertEquals($attribute->type(), $actualAttribute->type());
            $this->assertEquals($attribute->level(), $actualAttribute->level());
        }
    }

    public function dataProvider(): array
    {
        $weapon = WeaponObjectMother::buildCustom(
            NameObjectMother::buildCustom('bjorn'),
            WeaponTypeObjectMother::sword(),
            WeaponLevelObjectMother::buildCustom(1)
        );

        return [
            'bjorn, sword, level 1' => [
                WeaponAttributesObjectMother::buildCustom(
                    $weapon,
                    AttributeCollectionObjectMother::buildCustom(
                        AttributeObjectMother::buildCustom(
                            AttributeNameTypeObjectMother::fire(),
                            AttributeLevelObjectMother::buildCustom(1)
                        )
                    )
                ),
                $weapon,
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::fire(),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
            ],
            'bjorn, sword, level, with fire, wind and light attributes' => [
                WeaponAttributesObjectMother::buildCustom(
                    $weapon,
                    AttributeCollectionObjectMother::buildCustom(
                        AttributeObjectMother::buildCustom(
                            AttributeNameTypeObjectMother::fire(),
                            AttributeLevelObjectMother::buildCustom(1)
                        ),
                        AttributeObjectMother::buildCustom(
                            AttributeNameTypeObjectMother::wind(),
                            AttributeLevelObjectMother::buildCustom(1)
                        ),
                        AttributeObjectMother::buildCustom(
                            AttributeNameTypeObjectMother::light(),
                            AttributeLevelObjectMother::buildCustom(1)
                        )
                    )
                ),
                $weapon,
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::fire(),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::wind(),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::light(),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
            ]
        ];
    }
}
