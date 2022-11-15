<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Application\UseCase\Weapon\Attribute;

use JasterTDC\Warriors\Application\UseCase\Weapon\Attribute\AddWeaponAttributeUseCase;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Weapon\Weapon;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\AttributeType\ObjectMother\AttributeTypeObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\Name\ObjectMother\AttributeNameObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother\AttributeLevelObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother\AttributeNameTypeObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother\AttributeObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\ObjectMother\WeaponObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\ObjectMother\WeaponTypeMother;
use PHPUnit\Framework\TestCase;

final class AddWeaponAttributeUseCaseTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenAddAttributeThenReturnValid(
        Weapon $weapon,
        Attribute $attribute,
        Attribute $attributeDoesNotExist,
        bool $hasAttribute,
        bool $hasExactlyAttribute,
        bool $hasShouldNotExistAttribute,
        bool $hasExactlyShouldNotExistAttribute
    ): void {
        $useCase = new AddWeaponAttributeUseCase();
        $weaponWithAttribute = $useCase->handle($weapon, $attribute);

        $this->assertEquals($hasAttribute, $weaponWithAttribute->hasAttribute($attribute));
        $this->assertEquals($hasExactlyAttribute, $weaponWithAttribute->hasExactlyAttribute($attribute));
        $this->assertEquals(
            $hasShouldNotExistAttribute,
            $weaponWithAttribute->hasAttribute($attributeDoesNotExist)
        );
        $this->assertEquals(
            $hasExactlyShouldNotExistAttribute,
            $weaponWithAttribute->hasExactlyAttribute($attributeDoesNotExist)
        );
    }

    public function dataProvider(): array
    {
        return [
            'Axe, attack attribute, not has courage' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::AXE),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::attack(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::courage(),
                        AttributeTypeObjectMother::exceptional()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                true,
                true,
                false,
                false,
            ],
            'Axe, attack-common attribute, not has attack-exceptional' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::AXE),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::attack(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::attack(),
                        AttributeTypeObjectMother::exceptional()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                true,
                true,
                false,
                false,
            ],
            'Axe with attack attribute level 1, attack attribute level 2, not has attack with level 2' => [
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive:WeaponTypeMother::AXE,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 1
                        ]
                    ]
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::attack(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(2)
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::attack(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(2)
                ),
                true,
                false,
                true,
                false,
            ],
            'Dagger, courage attribute, not has attack' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::DAGGER),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::courage(),
                        AttributeTypeObjectMother::exceptional()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::attack(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                true,
                true,
                false,
                false,
            ],
            'Sword, death attribute, not has attack' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::SWORD),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::death(),
                        AttributeTypeObjectMother::rare()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::attack(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                true,
                true,
                false,
                false,
            ],
            'Sword, frenzy attribute, not has attack' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::SWORD),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::frenzy(),
                        AttributeTypeObjectMother::unique()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::attack(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                true,
                true,
                false,
                false,
            ],
        ];
    }
}
