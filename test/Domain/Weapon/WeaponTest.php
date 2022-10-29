<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon;

use PHPUnit\Framework\TestCase;
use JasterTDC\Warriors\Domain\Weapon\Weapon;
use JasterTDC\Warriors\Domain\Shared\Exception\InvalidName;
use JasterTDC\Warriors\Domain\Shared\Exception\InvalidAlias;
use JasterTDC\Warriors\Domain\Shared\Exception\InvalidLastname;
use JasterTDC\Warriors\Domain\Weapon\WeaponType\WeaponType;
use JasterTDC\Warriors\Test\Domain\Weapon\ObjectMother\WeaponObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\ObjectMother\WeaponTypeMother;

final class WeaponTest extends TestCase
{
    /**
     * @param string $weaponTypePrimitive
     * @param string $namePrimitive
     * @param string $lastnamePrimitive
     * @param string $aliasPrimitive
     * @return void
     * @dataProvider dataProviderWhenConstruct
     */
    public function testGivenValidWhenConstructThenReturnValid(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive
    ): void {
        $weapon = Weapon::buildFromPrimitives(
            $weaponTypePrimitive,
            $namePrimitive,
            $lastnamePrimitive,
            $aliasPrimitive
        );

        $this->assertEquals($namePrimitive, $weapon->name());
        $this->assertEquals($lastnamePrimitive, $weapon->lastname());
        $this->assertEquals($aliasPrimitive, $weapon->alias());
    }

    public function dataProviderWhenConstruct(): array
    {
        return [
            'sword, Lu Xun' => [
                WeaponTypeMother::SWORD,
                'Lu', 
                'Xun',
                'Luxu'
            ],
            'sword, Xin Xialing' => [
                WeaponTypeMother::SWORD,
                'Xin',
                'Xialing',
                'Xialing'
            ],
            'axe, Xiapiomaturaea Ning' => [
                WeaponTypeMother::AXE,
                'Xiapiomaturaea',
                'Ning',
                'Gan Ning'
            ],
            'axe, Lu Xhu' => [
                WeaponTypeMother::AXE,
                'Lu',
                'Xhu',
                'Kicho'
            ],
            'dagger, Lu Zu' => [
                WeaponTypeMother::DAGGER,
                'Lu',
                'Zu',
                'Jubei'
            ],
            'dagger, Xuo Taipei' => [
                WeaponTypeMother::DAGGER,
                'Xuo',
                'Taipei',
                'XuoTaipein'
            ]
        ];
    }

    /**
     * @param string $weaponTypePrimitive
     * @param string $namePrimitive
     * @param string $lastnamePrimitive
     * @param string $aliasPrimitive
     * @return void
     * @dataProvider dataProviderForGivenInvalidNameWhenConstruct
     */
    public function testGivenInvalidNameWhenConstructThenExceptionIsThrown(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive
    ): void {
        $this->expectException(InvalidName::class);

        Weapon::buildFromPrimitives($weaponTypePrimitive, $namePrimitive, $lastnamePrimitive, $aliasPrimitive);
    }

    public function dataProviderForGivenInvalidNameWhenConstruct(): array
    {
        return [
            'less than two characters' => [WeaponTypeMother::SWORD, 'X', 'Xialing', 'Xialing'],
            'more than 14 characters' => [WeaponTypeMother::SWORD, 'Xinoalpitamoxirtivuz', 'Xialing', 'Xialing']
        ];
    }

    /**
     * @param string $weaponTypePrimitive
     * @param string $namePrimitive
     * @param string $lastnamePrimitive
     * @param string $aliasPrimitive
     * @return void
     * @dataProvider dataProviderForGivenInvalidLastnameWhenConstruct
     */
    public function testGivenInvalidLastnameWhenConstructThenExceptionIsThrown(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive
    ): void {
        $this->expectException(InvalidLastname::class);

        Weapon::buildFromPrimitives($weaponTypePrimitive, $namePrimitive, $lastnamePrimitive, $aliasPrimitive);
    }

    public function dataProviderForGivenInvalidLastnameWhenConstruct(): array
    {
        return [
            'less than two characters' => [WeaponTypeMother::SWORD, 'Xhu', 'Z', 'Xuno'],
        ];
    }

    /**
     * @param string $weaponTypePrimitive
     * @param string $namePrimitive
     * @param string $lastnamePrimitive
     * @param string $aliasPrimitive
     * @return void
     * @dataProvider dataProviderForInvalidAlias
     */
    public function testGivenInvalidAliasWhenConstructThenExceptionIsThrown(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive
    ): void {
        $this->expectException(InvalidAlias::class);

        Weapon::buildFromPrimitives($weaponTypePrimitive, $namePrimitive, $lastnamePrimitive, $aliasPrimitive);
    }

    public function dataProviderForInvalidAlias(): array
    {
        return [
            'less than 4 characters' => [
                WeaponTypeMother::SWORD,
                'Lu',
                'Xun',
                'Lux'
            ],
            'more than 10 characters' => [
                WeaponTypeMother::SWORD,
                'Lu',
                'Xun',
                'BestStrategaEver'
            ]
        ];
    }

    /**
     * @param Weapon $weapon
     * @param WeaponType $weaponType
     * @param WeaponType $differentWeaponType
     * @return void
     * @dataProvider dataProviderForCompareWeaponType
     */
    public function testGivenValidWhenCompareWeaponTypeThenReturnValid(
        Weapon $weapon,
        WeaponType $weaponType,
        WeaponType $differentWeaponType
    ): void {
        $this->assertTrue($weapon->equalsWeaponType($weaponType));
        $this->assertFalse($weapon->equalsWeaponType($differentWeaponType));
    }

    public function dataProviderForCompareWeaponType(): array
    {
        return [
            'sword, axe' => [
                WeaponObjectMother::buildCustom(weaponTypePrimitive: WeaponTypeMother::SWORD),
                WeaponTypeMother::buildSword(),
                WeaponTypeMother::buildAxe(),
            ],
            'sword, dagger' => [
                WeaponObjectMother::buildCustom(weaponTypePrimitive: WeaponTypeMother::SWORD),
                WeaponTypeMother::buildSword(),
                WeaponTypeMother::buildDagger(),
            ],
            'axe, sword' => [
                WeaponObjectMother::buildCustom(weaponTypePrimitive: WeaponTypeMother::AXE),
                WeaponTypeMother::buildAxe(),
                WeaponTypeMother::buildSword(),
            ],
            'axe, dagger' => [
                WeaponObjectMother::buildCustom(weaponTypePrimitive: WeaponTypeMother::AXE),
                WeaponTypeMother::buildAxe(),
                WeaponTypeMother::buildDagger(),
            ],
            'dagger, sword' => [
                WeaponObjectMother::buildCustom(weaponTypePrimitive: WeaponTypeMother::DAGGER),
                WeaponTypeMother::buildDagger(),
                WeaponTypeMother::buildSword(),
            ],
            'dagger, axe' => [
                WeaponObjectMother::buildCustom(weaponTypePrimitive: WeaponTypeMother::DAGGER),
                WeaponTypeMother::buildDagger(),
                WeaponTypeMother::buildAxe(),
            ],
        ];
    }
}
