<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\Factory;

use JasterTDC\Warriors\Domain\Weapon\WeaponType\Exception\InvalidWeaponType;
use PHPUnit\Framework\TestCase;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;
use JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\ObjectMother\WeaponTypeMother;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\Factory\FromStringWeaponTypeFactory;

final class FromStringWeaponTypeFactoryTest extends TestCase 
{
    /**
     * @param WeaponType $weaponType
     * @param string $weaponTypePrimitive
     * @return void
     * @dataProvider dataProviderForHappyPath
     */
    public function testGivenValidWhenHappyPathThenReturnValid(
        WeaponType $weaponType,
        string $weaponTypePrimitive
    ): void {
        $actualWeaponType = FromStringWeaponTypeFactory::buildFromPrimitive($weaponTypePrimitive);

        $this->assertEquals($weaponType->value(), $actualWeaponType->value());
    }

    public function dataProviderForHappyPath(): array
    {
        return [
            'axe' => [
                WeaponTypeMother::buildAxe(),
                'axe'
            ],
            'dagger' => [
                WeaponTypeMother::buildDagger(),
                'dagger'
            ],
            'sword' => [
                WeaponTypeMother::buildSword(),
                'sword',
            ],
        ];
    }

    public function testGivenInvalidThenExceptionIsThrown(): void
    {
        $this->expectException(InvalidWeaponType::class);

        FromStringWeaponTypeFactory::buildFromPrimitive('invalid-weapon');
    }
}
