<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeType\Domain\Factory;

use JasterTDC\Warriors\AttributeType\Domain\AttributeType;
use JasterTDC\Warriors\AttributeType\Domain\Exception\InvalidAttributeType;
use JasterTDC\Warriors\AttributeType\Domain\Factory\AttributeTypeFactory;
use JasterTDC\Warriors\Test\AttributeType\Domain\ObjectMother\AttributeTypeObjectMother;
use PHPUnit\Framework\TestCase;

final class AttributeTypeFactoryTest extends TestCase
{
    /** @dataProvider dataProviderForHappyPath */
    public function testGivenValidWhenHappyPathThenReturnValid(
        AttributeType $attributeType,
        string $primitiveType
    ): void {
        $actual = AttributeTypeFactory::build($primitiveType);

        $this->assertEquals($attributeType->value(), $actual->value());
        $this->assertEquals($attributeType->__toString(), $actual->__toString());
        $this->assertTrue($attributeType->equals($actual));
    }

    public function dataProviderForHappyPath(): array
    {
        return [
            'common' => [
                AttributeTypeObjectMother::common(),
                'common'
            ],
            'rare' => [
                AttributeTypeObjectMother::rare(),
                'rare'
            ],
        ];
    }

    /** @dataProvider dataProviderForInvalid */
    public function testGivenInvalidWhenBuidThenExceptionIsThrown(string $primitiveType): void
    {
        $this->expectException(InvalidAttributeType::class);

        AttributeTypeFactory::build($primitiveType);
    }

    public function dataProviderForInvalid(): array
    {
        return [
            'exceptional' => ['exceptional'],
            'unique' => ['unique'],
            'mystic' => ['mystic']
        ];
    }
}
