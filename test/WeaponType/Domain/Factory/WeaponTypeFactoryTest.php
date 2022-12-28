<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\WeaponType\Domain\Factory;

use JasterTDC\Warriors\Test\WeaponType\Domain\ObjectMother\WeaponTypeObjectMother;
use JasterTDC\Warriors\WeaponType\Domain\Factory\WeaponTypeFactory;
use JasterTDC\Warriors\WeaponType\Domain\WeaponType;
use JasterTDC\Warriors\WeaponType\Domain\Exception\InvalidWeaponType;
use PHPUnit\Framework\TestCase;

final class WeaponTypeFactoryTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenHappyPathThenReturnValid(
        WeaponType $expected,
        string $primitiveType
    ): void {
        $actual = WeaponTypeFactory::build($primitiveType);

        $this->assertEquals($expected->value(), $actual->value());
        $this->assertTrue($expected->equals($actual));
    }

    public function dataProvider(): array
    {
        return [
            'axe' => [
                WeaponTypeObjectMother::axe(),
                WeaponTypeObjectMother::AXE,
            ],
            'sword' => [
                WeaponTypeObjectMother::sword(),
                WeaponTypeObjectMother::SWORD,
            ],
        ];
    }

    /** @dataProvider dataProviderforInvalid */
    public function testGivenInvalidWhenBuildThenExceptionIsThrown(string $primitiveType): void
    {
        $this->expectException(InvalidWeaponType::class);

        WeaponTypeFactory::build($primitiveType);
    }

    public function dataProviderforInvalid(): array
    {
        return [
            'bow' => ['bow'],
            'dagger' => ['dagger'],
            'dual sword' => ['dual sword'],
        ];
    }
}
