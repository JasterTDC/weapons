<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\WeaponType;

use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;
use JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\ObjectMother\WeaponTypeMother;
use PHPUnit\Framework\TestCase;

final class WeaponTypeTest extends TestCase
{
    /**
     * @param WeaponType $weaponType
     * @param WeaponType $differentWeaponType
     * @return void
     * @dataProvider dataProviderForCompare
     */
    public function testGivenValidWhenCompareThenReturnValid(
        WeaponType $weaponType,
        WeaponType $differentWeaponType
    ): void {
        $this->assertTrue($weaponType->equals($weaponType));
        $this->assertFalse($weaponType->equals($differentWeaponType));
    }

    public function dataProviderForCompare(): array
    {
        return [
            'sword, axe' => [
                WeaponTypeMother::buildSword(),
                WeaponTypeMother::buildAxe(),
            ],
            'sword, dagger' => [
                WeaponTypeMother::buildSword(),
                WeaponTypeMother::buildDagger(),
            ],
            'axe, sword' => [
                WeaponTypeMother::buildAxe(),
                WeaponTypeMother::buildSword(),
            ],
            'axe, dagger' => [
                WeaponTypeMother::buildAxe(),
                WeaponTypeMother::buildDagger(),
            ],
            'dagger, axe' => [
                WeaponTypeMother::buildDagger(),
                WeaponTypeMother::buildAxe(),
            ],
            'dagger, sword' => [
                WeaponTypeMother::buildDagger(),
                WeaponTypeMother::buildSword(),
            ],
        ];
    }

    /**
     * @param WeaponType $weaponType
     * @param string $weaponTypeValue
     * @return void
     * @dataProvider dataProviderForCheckValue
     */
    public function testGivenValidWhenCheckValueThenReturnValid(
        WeaponType $weaponType,
        string $weaponTypeValue
    ): void {
        $this->assertEquals($weaponType->value(), $weaponTypeValue);
    }

    public function dataProviderForCheckValue(): array
    {
        return [
            'axe' => [
                WeaponTypeMother::buildAxe(),
                WeaponTypeMother::AXE,
            ],
            'dagger' => [
                WeaponTypeMother::buildDagger(),
                WeaponTypeMother::DAGGER,
            ],
            'sword' => [
                WeaponTypeMother::buildSword(),
                WeaponTypeMother::SWORD,
            ],
        ];
    }
}
