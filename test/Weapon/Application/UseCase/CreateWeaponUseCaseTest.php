<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Weapon\Application\UseCase;

use JasterTDC\Warriors\Shared\Domain\Exception\InvalidLevel;
use JasterTDC\Warriors\Shared\Domain\Exception\InvalidName;
use JasterTDC\Warriors\Test\Shared\Domain\ObjectMother\NameObjectMother;
use JasterTDC\Warriors\Test\Weapon\Domain\ObjectMother\WeaponObjectMother;
use JasterTDC\Warriors\Test\WeaponLevel\Domain\ObjectMother\WeaponLevelObjectMother;
use JasterTDC\Warriors\Test\WeaponType\Domain\ObjectMother\WeaponTypeObjectMother;
use JasterTDC\Warriors\Weapon\Application\UseCase\CreateWeaponUseCase;
use JasterTDC\Warriors\Weapon\Domain\Weapon;
use JasterTDC\Warriors\WeaponLevel\Domain\Exception\InvalidWeaponLevel;
use JasterTDC\Warriors\WeaponType\Domain\Exception\InvalidWeaponType;
use PHPUnit\Framework\TestCase;

final class CreateWeaponUseCaseTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenHappyPathThenReturnValid(
        Weapon $expected,
        string $name,
        string $type,
        int $level
    ): void {
        $useCase = new CreateWeaponUseCase();

        $actual = $useCase->__invoke($name, $type, $level);

        $this->assertEquals($expected->name(), $actual->name());
        $this->assertEquals($expected->type(), $actual->type());
        $this->assertEquals($expected->level(), $actual->level());
    }

    public function dataProvider(): array
    {
        return [
            'dovelpher, sword, level 1' => [
                WeaponObjectMother::buildCustom(
                    NameObjectMother::buildCustom('dovelpher'),
                    WeaponTypeObjectMother::sword(),
                    WeaponLevelObjectMother::buildCustom(1)
                ),
                'dovelpher',
                'sword',
                1
            ],
            'svartalf, sword, level 100' => [
                WeaponObjectMother::buildCustom(
                    NameObjectMother::buildCustom('svartalf'),
                    WeaponTypeObjectMother::sword(),
                    WeaponLevelObjectMother::buildCustom(100)
                ),
                'svartalf',
                'sword',
                100
            ],
            'dovelpher, axe, level 1' => [
                WeaponObjectMother::buildCustom(
                    NameObjectMother::buildCustom('dovelpher'),
                    WeaponTypeObjectMother::axe(),
                    WeaponLevelObjectMother::buildCustom(1)
                ),
                'dovelpher',
                'axe',
                1
            ],
            'svartalf, axe, level 100' => [
                WeaponObjectMother::buildCustom(
                    NameObjectMother::buildCustom('svartalf'),
                    WeaponTypeObjectMother::axe(),
                    WeaponLevelObjectMother::buildCustom(100)
                ),
                'svartalf',
                'axe',
                100
            ],
        ];
    }

    /** @dataProvider dataProviderForInvalidName */
    public function testGivenInvalidNameWhenCreateThenExceptionIsThrown(string $name, string $type, int $level): void
    {
        $this->expectException(InvalidName::class);

        $useCase = new CreateWeaponUseCase();

        $useCase->__invoke($name, $type, $level);
    }

    public function dataProviderForInvalidName(): array
    {
        return [
            'empty name, sword, level 1' => [
                '',
                'sword',
                1
            ],
            'empty name, axe, level 1' => [
                '',
                'axe',
                1
            ],
        ];
    }

    /** @dataProvider dataProviderForMoreThanMaximumLevel */
    public function testGivenMoreThanMaximumLevelWhenCreateThenExceptionIsThrown(string $name, string $type, int $level): void
    {
        $this->expectException(InvalidWeaponLevel::class);
        
        $useCase = new CreateWeaponUseCase();

        $useCase->__invoke($name, $type, $level);
    }

    public function dataProviderForMoreThanMaximumLevel(): array
    {
        return [
            'svartalf, sword, 200' => [
                'svartalf',
                'sword',
                200
            ],
            'anthalof, axe, 101' => [
                'anthalof',
                'axe',
                101
            ],
        ];
    }

    /** @dataProvider dataProviderForLessThanMinimumLevel */
    public function testGivenLessThanMinimumWhenCreateThenExceptionIsThrown(string $name, string $type, int $level): void
    {
        $this->expectException(InvalidLevel::class);
        
        $useCase = new CreateWeaponUseCase();

        $useCase->__invoke($name, $type, $level);
    }

    public function dataProviderForLessThanMinimumLevel(): array
    {
        return [
            'svartalf, sword, 200' => [
                'svartalf',
                'sword',
                -1
            ],
            'anthalof, axe, 101' => [
                'anthalof',
                'axe',
                -20
            ],
        ];
    }

    /** @dataProvider dataProviderForInvalidWeaponType */
    public function testGivenInvalidWeaponTypeWhenCreateThenExceptionIsThrown(string $name, string $type, int $level): void
    {
        $this->expectException(InvalidWeaponType::class);
        
        $useCase = new CreateWeaponUseCase();

        $useCase->__invoke($name, $type, $level);
    }

    public function dataProviderForInvalidWeaponType(): array
    {
        return [
            'phonart, bow, 1' => [
                'phonart',
                'bow',
                1
            ],
            'hertient, dagger, 1' => [
                'hertient',
                'dagger',
                1
            ],
        ];
    }
}
