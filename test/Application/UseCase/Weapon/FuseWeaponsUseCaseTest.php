<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Application\UseCase\Weapon;

use JasterTDC\Warriors\Application\UseCase\Weapon\FuseWeaponsUseCase;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Weapon\Exception\InvalidFuseWeaponType;
use JasterTDC\Warriors\Domain\Weapon\Weapon;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\Name\ObjectMother\AttributeNameObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\ObjectMother\WeaponObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\ObjectMother\WeaponTypeMother;
use PHPUnit\Framework\TestCase;

final class FuseWeaponsUseCaseTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenFuseThenReturnValid(
        Weapon $originalWeapon,
        Weapon $secondaryWeapon,
        Weapon $expectedFusedWeapon
    ): void {
        $useCase = new FuseWeaponsUseCase();
        $fusedWeapon = $useCase->handle($originalWeapon, $secondaryWeapon);

        $this->assertEquals($expectedFusedWeapon->name(), $fusedWeapon->name());
        $this->assertEquals($expectedFusedWeapon->lastname(), $fusedWeapon->lastname());
        $this->assertEquals($expectedFusedWeapon->alias(), $fusedWeapon->alias());
        $this->assertEquals($expectedFusedWeapon->attributesCount(), $fusedWeapon->attributesCount());

        /** @var Attribute $attribute */
        foreach ($expectedFusedWeapon->attributeCollection() as $attribute) {
            $this->assertTrue($fusedWeapon->hasAttribute($attribute));
            $this->assertTrue($fusedWeapon->hasExactlyAttribute($attribute));
        }
    }

    public function dataProvider(): array
    {
        return [
            'sword with attack, sword with courage' => [
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 1
                        ],
                    ],
                ),
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::COURAGE,
                            Attribute::LEVEL => 1
                        ],
                    ],
                ),
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 1
                        ],
                        [
                            Attribute::NAME => AttributeNameObjectMother::COURAGE,
                            Attribute::LEVEL => 1
                        ],
                    ],
                ),
            ],
            'sword with attack level 1, sword with attack level 5' => [
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 1
                        ],
                    ],
                ),
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 5
                        ],
                    ],
                ),
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 1
                        ],
                    ],
                ),
            ],
            'sword with attack and courage, sword with attack, death and frenzy' => [
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 1
                        ],
                        [
                            Attribute::NAME => AttributeNameObjectMother::COURAGE,
                            Attribute::LEVEL => 1
                        ],
                    ],
                ),
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 1
                        ],
                        [
                            Attribute::NAME => AttributeNameObjectMother::DEATH,
                            Attribute::LEVEL => 1
                        ],
                        [
                            Attribute::NAME => AttributeNameObjectMother::FRENZY,
                            Attribute::LEVEL => 1
                        ],
                    ],
                ),
                WeaponObjectMother::buildCustom(
                    weaponTypePrimitive: WeaponTypeMother::SWORD,
                    primitiveAttributes: [
                        [
                            Attribute::NAME => AttributeNameObjectMother::ATTACK,
                            Attribute::LEVEL => 1
                        ],
                        [
                            Attribute::NAME => AttributeNameObjectMother::COURAGE,
                            Attribute::LEVEL => 1
                        ],
                        [
                            Attribute::NAME => AttributeNameObjectMother::DEATH,
                            Attribute::LEVEL => 1
                        ],
                        [
                            Attribute::NAME => AttributeNameObjectMother::FRENZY,
                            Attribute::LEVEL => 1
                        ],
                    ],
                ),
            ],
        ];
    }

    /** @dataProvider dataProviderForIncompatibleTypes */
    public function testGivenIncompatibleTypesWhenFuseThenExceptionIsThrown(
        Weapon $originalWeapon,
        Weapon $secondaryWeapon
    ): void {
        $this->expectException(InvalidFuseWeaponType::class);

        $useCase = new FuseWeaponsUseCase();
        $useCase->handle($originalWeapon, $secondaryWeapon);
    }

    public function dataProviderForIncompatibleTypes(): array
    {
        return [
            'sword with axe' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::SWORD),
                WeaponObjectMother::buildCustom(WeaponTypeMother::AXE),
            ], 
            'sword with dagger' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::SWORD),
                WeaponObjectMother::buildCustom(WeaponTypeMother::DAGGER),
            ],
            'axe with sword' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::AXE),
                WeaponObjectMother::buildCustom(WeaponTypeMother::SWORD),
            ],
            'axe with dagger' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::AXE),
                WeaponObjectMother::buildCustom(WeaponTypeMother::DAGGER),
            ],
            'dagger with sword' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::DAGGER),
                WeaponObjectMother::buildCustom(WeaponTypeMother::SWORD),
            ],
            'dagger with axe' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::DAGGER),
                WeaponObjectMother::buildCustom(WeaponTypeMother::AXE),
            ],
        ];
    }
}
