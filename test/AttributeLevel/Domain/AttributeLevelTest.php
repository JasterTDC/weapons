<?php

declare(strict_types = 1);

namespace JasterTDC\Warriors\Test\AttributeLevel\Domain;

use PHPUnit\Framework\TestCase;
use JasterTDC\Warriors\AttributeLevel\Domain\AttributeLevel;
use JasterTDC\Warriors\AttributeLevel\Domain\Exception\InvalidAttributeLevel;
use JasterTDC\Warriors\Shared\Domain\Exception\InvalidLevel;

final class AttributeLevelTest extends TestCase
{
    /** @dataProvider dataProviderForHappyPath */
    public function testGivenValidWhenHappyPathThenReturnValid(int $level): void
    {
        $attributeLevel = new AttributeLevel($level);

        $this->assertEquals($level, $attributeLevel->value());
    }

    public function dataProviderForHappyPath(): array
    {
        return [
            'level 1' => [1],
            'level 10' => [10],
            'level 20' => [20]
        ];
    }

    /** @dataProvider dataProviderForBelowZero */
    public function testGivenBelowZeroWhenConstructThenExceptionIsThrown(int $level): void
    {
        $this->expectException(InvalidLevel::class);

        new AttributeLevel($level);
    }

    public function dataProviderForBelowZero(): array
    {
        return [
            'level 0' => [0],
            'level -10' => [-10],
            'level -20' => [-20]
        ];
    }

    /** @dataProvider dataProviderForMoreThanMaximum */
    public function testGivenMoreThanMaximumWhenConstructThenExceptionIsThrown(int $level): void
    {
        $this->expectException(InvalidAttributeLevel::class);

        new AttributeLevel($level);
    }

    public function dataProviderForMoreThanMaximum(): array
    {
        return [
            'level 21' => [21],
            'level 30' => [30],
            'level 40' => [40]
        ];
    }
}
