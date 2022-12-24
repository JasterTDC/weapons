<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeNameType\Domain\Factory;

use JasterTDC\Warriors\AttributeName\Domain\Exception\InvalidAttributeName;
use JasterTDC\Warriors\AttributeNameType\Domain\AttributeNameType;
use JasterTDC\Warriors\AttributeNameType\Domain\Factory\AttributeNameTypeFactory;
use JasterTDC\Warriors\Test\AttributeName\Domain\ObjectMother\AttributeNameObjectMother;
use JasterTDC\Warriors\Test\AttributeNameType\Domain\ObjectMother\AttributeNameTypeObjectMother;
use JasterTDC\Warriors\Test\AttributeType\Domain\ObjectMother\AttributeTypeObjectMother;
use PHPUnit\Framework\TestCase;

final class AttributeNameTypeFactoryTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenHappyPathThenReturnValid(
        AttributeNameType $expected,
        string $primitiveName
    ): void {
        $actual = AttributeNameTypeFactory::build($primitiveName);

        $this->assertEquals($expected->name(), $actual->name());
        $this->assertEquals($expected->type(), $actual->type());
    }

    public function dataProvider(): array
    {
        return [
            'fire' => [
                AttributeNameTypeObjectMother::buildCustom(
                    AttributeNameObjectMother::fire(),
                    AttributeTypeObjectMother::common()
                ),
                AttributeNameObjectMother::FIRE
            ],
            'light' => [
                AttributeNameTypeObjectMother::buildCustom(
                    AttributeNameObjectMother::light(),
                    AttributeTypeObjectMother::rare()
                ),
                AttributeNameObjectMother::LIGHT
            ],
            'wind' => [
                AttributeNameTypeObjectMother::buildCustom(
                    AttributeNameObjectMother::wind(),
                    AttributeTypeObjectMother::common()
                ),
                AttributeNameObjectMother::WIND
            ],
        ];
    }

    /** @dataProvider dataProviderForInvalid */
    public function testGivenInvalidWhenBuildThenExceptionIsThrown(string $primitiveName): void
    {
        $this->expectException(InvalidAttributeName::class);

        AttributeNameTypeFactory::build($primitiveName);
    }

    public function dataProviderForInvalid(): array
    {
        return [
            'courage' => ['courage'],
            'death' => ['death'],
            'magma' => ['magma']
        ];
    }
}
