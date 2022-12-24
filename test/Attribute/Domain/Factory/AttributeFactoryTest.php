<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\Attribute\Domain\Factory;

use JasterTDC\Warriors\Attribute\Domain\Attribute;
use JasterTDC\Warriors\Attribute\Domain\Factory\AttributeFactory;
use JasterTDC\Warriors\AttributeLevel\Domain\Exception\InvalidAttributeLevel;
use JasterTDC\Warriors\AttributeName\Domain\Exception\InvalidAttributeName;
use JasterTDC\Warriors\Shared\Domain\Exception\InvalidLevel;
use JasterTDC\Warriors\Test\Attribute\Domain\ObjectMother\AttributeObjectMother;
use JasterTDC\Warriors\Test\AttributeLevel\Domain\ObjectMother\AttributeLevelObjectMother;
use JasterTDC\Warriors\Test\AttributeName\Domain\ObjectMother\AttributeNameObjectMother;
use JasterTDC\Warriors\Test\AttributeNameType\Domain\ObjectMother\AttributeNameTypeObjectMother;
use JasterTDC\Warriors\Test\AttributeType\Domain\ObjectMother\AttributeTypeObjectMother;
use PHPUnit\Framework\TestCase;

final class AttributeFactoryTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenHappyPathThenReturnValid(
        Attribute $expected,
        string $primitiveName,
        int $primitiveLevel
    ): void {
        $actual = AttributeFactory::build($primitiveName, $primitiveLevel);

        $this->assertEquals($expected->name(), $actual->name());
        $this->assertEquals($expected->type(), $actual->type());
        $this->assertEquals($expected->level(), $actual->level());
    }

    public function dataProvider(): array
    {
        return [
            'fire, common, level 1' => [
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::fire(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeNameObjectMother::FIRE,
                1,
            ],
            'fire, common, level 20' => [
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::fire(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(20)
                ),
                AttributeNameObjectMother::FIRE,
                20,
            ],
            'light, rare, level 1' => [
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::light(),
                        AttributeTypeObjectMother::rare()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeNameObjectMother::LIGHT,
                1,
            ],
            'wind, common, level 1' => [
                AttributeObjectMother::buildCustom(
                    AttributeNameTypeObjectMother::buildCustom(
                        AttributeNameObjectMother::wind(),
                        AttributeTypeObjectMother::common()
                    ),
                    AttributeLevelObjectMother::buildCustom(1)
                ),
                AttributeNameObjectMother::WIND,
                1,
            ],
        ];
    }

    /** @dataProvider dataProviderForInvalidName */
    public function testGivenInvalidNameWhenBuildThenExceptionIsThrown(
        string $primitiveName,
        int $primitiveLevel
    ): void {
        $this->expectException(InvalidAttributeName::class);

        AttributeFactory::build($primitiveName, $primitiveLevel);
    }

    public function dataProviderForInvalidName(): array
    {
        return [
            'courage' => ['courage', 1],
            'death' => ['death', 10],
            'magma' => ['magma', 15]
        ];
    }

    /** @dataProvider dataProviderForInvalidAttributeLevel */
    public function testGivenInvalidAttributeLevelWhenBuildThenExceptionIsThrown(
        string $primitiveName,
        int $primitiveLevel
    ): void {
        $this->expectException(InvalidAttributeLevel::class);

        AttributeFactory::build($primitiveName, $primitiveLevel);
    }

    public function dataProviderForInvalidAttributeLevel(): array
    {
        return [
            'wind, level 21' => [AttributeNameObjectMother::WIND, 21],
            'wind, level 25' => [AttributeNameObjectMother::WIND, 25],
            'wind, level 30' => [AttributeNameObjectMother::WIND, 30],
        ];
    }

        /** @dataProvider dataProviderForInvalidLevel */
    public function testGivenInvalidLevelWhenBuildThenExceptionIsThrown(
        string $primitiveName,
        int $primitiveLevel
    ): void {
        $this->expectException(InvalidLevel::class);

        AttributeFactory::build($primitiveName, $primitiveLevel);
    }

    public function dataProviderForInvalidLevel(): array
    {
        return [
            'wind, level -1' => [AttributeNameObjectMother::WIND, -1],
            'wind, level -10' => [AttributeNameObjectMother::WIND, -10],
            'wind, level -20' => [AttributeNameObjectMother::WIND, -20],
        ];
    }
}
