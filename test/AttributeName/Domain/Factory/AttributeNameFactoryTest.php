<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeName\Domain\Factory;

use JasterTDC\Warriors\AttributeName\Domain\Exception\InvalidAttributeName;
use JasterTDC\Warriors\AttributeName\Domain\Factory\AttributeNameFactory;
use PHPUnit\Framework\TestCase;

final class AttributeNameFactoryTest extends TestCase
{
    /** @dataProvider dataProviderForHappyPath */
    public function testGivenValidWhenHappyPathThenReturnValid(string $name): void
    {
        $actual = AttributeNameFactory::build($name);

        $this->assertEquals($name, $actual->value());
    }

    public function dataProviderForHappyPath(): array
    {
        return [
            'wind' => ['wind'],
            'fire' => ['fire'],
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
