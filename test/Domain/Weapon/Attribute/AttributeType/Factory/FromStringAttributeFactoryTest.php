<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Weapon\Attribute\AttributeType\Factory;

use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\AttributeType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Exception\InvalidAttributeType;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeType\Factory\FromStringAttributeTypeFactory;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\AttributeType\ObjectMother\AttributeTypeObjectMother;
use PHPUnit\Framework\TestCase;

final class FromStringAttributeTypeFactoryTest extends TestCase
{
    /**
     * @param AttributeType $expectedAttributeType
     * @param string $attributeTypePrimitive
     * @return void
     * @dataProvider dataProviderForHappyPath
     */
    public function testGivenValidWhenHappyPathThenReturnValid(
        AttributeType $expectedAttributeType,
        string $attributeTypePrimitive
    ): void {
        $attributeType = FromStringAttributeTypeFactory::build($attributeTypePrimitive);

        $this->assertEquals($expectedAttributeType->value(), $attributeType->value());
    }

    public function dataProviderForHappyPath(): array
    {
        return [
            'common' => [
                AttributeTypeObjectMother::common(),
                AttributeTypeObjectMother::COMMON
            ],
            'exceptional' => [
                AttributeTypeObjectMother::exceptional(),
                AttributeTypeObjectMother::EXCEPTIONAL
            ],
            'rare' => [
                AttributeTypeObjectMother::rare(),
                AttributeTypeObjectMother::RARE
            ],
            'unique' => [
                AttributeTypeObjectMother::unique(),
                AttributeTypeObjectMother::UNIQUE
            ],
        ];
    }

    public function testGivenInvalidWhenBuildThenExceptionIsThrown(): void
    {
        $this->expectException(InvalidAttributeType::class);

        FromStringAttributeTypeFactory::build('invalid-attribute-type');
    }
}
