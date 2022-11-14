<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Application\UseCase\Weapon\Attribute;

use JasterTDC\Warriors\Application\UseCase\Weapon\Attribute\AddWeaponAttributeUseCase;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Weapon\Weapon;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother\AttributeObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\ObjectMother\WeaponObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\ObjectMother\WeaponTypeMother;
use PHPUnit\Framework\TestCase;

final class AddWeaponAttributeUseCaseTest extends TestCase
{
    /**
     * @param Weapon $weapon
     * @param Attribute $attribute
     * @dataProvider dataProvider
     */
    public function testGivenValidWhenAddAttributeThenReturnValid(
        Weapon $weapon,
        Attribute $attribute
    ): void {
        $useCase = new AddWeaponAttributeUseCase();
        $weaponWithAttribute = $useCase->handle($weapon, $attribute);

        $this->assertTrue($weaponWithAttribute->hasAttribute($attribute));
    }

    public function dataProvider(): array
    {
        return [
            'Axe, attack attribute' => [
                WeaponObjectMother::buildCustom(WeaponTypeMother::AXE),
                AttributeObjectMother::buildCustom()
            ],
        ];
    }
}
