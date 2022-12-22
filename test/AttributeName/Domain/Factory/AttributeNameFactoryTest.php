<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeName\Domain\Factory;

use JasterTDC\Warriors\AttributeName\Domain\AttributeName;
use JasterTDC\Warriors\AttributeName\Domain\Exception\InvalidAttributeName;
use JasterTDC\Warriors\AttributeName\Domain\Factory\AttributeNameFactory;
use JasterTDC\Warriors\Test\AttributeName\Domain\ObjectMother\AttributeNameObjectMother;
use PHPUnit\Framework\TestCase;

final class AttributeNameFactoryTest extends TestCase
{
    /** @dataProvider dataProviderForHappyPath */
    public function testGivenValidWhenHappyPathThenReturnValid(string $name, AttributeName $attributeName): void
    {
        $actual = AttributeNameFactory::build($name);

        $this->assertEquals($name, $actual->value());
        $this->assertEquals($name, $actual->__toString());
        $this->assertTrue($attributeName->equals($actual));
    }

    public function dataProviderForHappyPath(): array
    {
        return [
            'wind' => ['wind', AttributeNameObjectMother::wind()],
            'fire' => ['fire', AttributeNameObjectMother::fire()],
            'light' => ['light', AttributeNameObjectMother::light()]
        ];
    }

    /** @dataProvider dataProviderForInvalid */
    public function testGivenInvalidWhenConstructThenExceptionIsThrown(string $name): void
    {
        $this->expectException(InvalidAttributeName::class);

        AttributeNameFactory::build($name);
    }

    public function dataProviderForInvalid(): array
    {
        return [
            'magma' => ['magma'],
            'ice' => ['ice'],
        ];
    }
}
