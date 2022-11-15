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
    /**
     * @param Weapon $weapon
     * @param Attribute $attribute
     * @param Attribute $attributeDoesNotExist
     * @dataProvider dataProvider
     */
    public function testGivenValidWhenAddAttributeThenReturnValid(
        Weapon $weapon,
        Attribute $attribute,
        Attribute $attributeDoesNotExist
    ): void {
        $useCase = new AddWeaponAttributeUseCase();
        $weaponWithAttribute = $useCase->handle($weapon, $attribute);
        $actualAttribute = $weaponWithAttribute->getAttribute($attribute);
        $notExistAttribute = $weaponWithAttribute->getAttribute($attributeDoesNotExist);

        $this->assertNotNull($actualAttribute);
        $this->assertNull($notExistAttribute);
        $this->assertTrue($weaponWithAttribute->hasAttribute($attribute));
        $this->assertTrue($weaponWithAttribute->hasExactlyAttribute($attribute));
        $this->assertFalse($weaponWithAttribute->hasAttribute($attributeDoesNotExist));
        $this->assertFalse($weaponWithAttribute->hasExactlyAttribute($attributeDoesNotExist));
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
            ],
        ];
    }
}
