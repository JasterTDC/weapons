<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Domain\Shared;

use JasterTDC\Warriors\Domain\Shared\Exception\InvalidAlias;
use JasterTDC\Warriors\Domain\Shared\Exception\InvalidLastname;
use PHPUnit\Framework\TestCase;
use JasterTDC\Warriors\Domain\Shared\Name\Name;
use JasterTDC\Warriors\Domain\Shared\Name\FullName;
use JasterTDC\Warriors\Domain\Shared\Exception\InvalidName;
use JasterTDC\Warriors\Domain\Shared\Name\Alias;
use JasterTDC\Warriors\Domain\Shared\Name\Lastname;

final class FullNameTest extends TestCase
{
    /**
     * @param string $name
     * @param string $lastname
     * @param string $alias
     * @return void
     * @dataProvider dataProviderForHappyPath
     */
    public function testGivenValidWhenHappyPathThenReturnValid(
        string $name,
        string $lastname,
        string $alias
    ): void {
        $fullName = new FullName(
            new Name($name),
            new Lastname($lastname),
            new Alias($alias)
        );

        $this->assertEquals($name, $fullName->name());
        $this->assertEquals($lastname, $fullName->lastname());
        $this->assertEquals($alias, $fullName->alias());
    }

    public function dataProviderForHappyPath(): array
    {
        return [
            'Lu Xun' => ['Lu', 'Xun', 'Luxu'],
            'Xin Xialing' => ['Xin', 'Xialing', 'Xialing'],
            'Xiapiomaturaea' => ['Xiapiomaturaea', 'Ning', 'Gan Ning'],
            'Lu Xhu' => ['Lu', 'Xhu', 'Kicho'],
            'Lu Zu' => ['Lu', 'Zu', 'Jubei'],
            'Xuo Taipei' => ['Xuo', 'Taipei', 'XuoTaipein']
        ];
    }

    /**
     * @param string $name
     * @param string $lastname
     * @param string $alias
     * @return void
     * @dataProvider dataProviderForGivenInvalidNameWhenConstruct
     */
    public function testGivenInvalidNameWhenConstructThenExceptionIsThrown(
        string $name,
        string $lastname,
        string $alias
    ): void {
        $this->expectException(InvalidName::class);

        new FullName(
            new Name($name),
            new Lastname($lastname),
            new Alias($alias)
        );
    }

    public function dataProviderForGivenInvalidNameWhenConstruct(): array
    {
        return [
            'less than two characters' => ['X', 'Xialing', 'Xialing'],
            'more than 14 characters' => ['Xinoalpitamoxirtivuz', 'Xialing', 'Xialing']
        ];
    }

    /**
     * @param string $name
     * @param string $lastname
     * @param string $alias
     * @return void
     * @dataProvider dataProviderForGivenInvalidLastnameWhenConstruct
     */
    public function testGivenInvalidLastnameWhenConstructThenExceptionIsThrown(
        string $name,
        string $lastname,
        string $alias
    ): void {
        $this->expectException(InvalidLastname::class);

        new FullName(
            new Name($name),
            new Lastname($lastname),
            new Alias($alias)
        );
    }

    public function dataProviderForGivenInvalidLastnameWhenConstruct(): array
    {
        return [
            'less than two characters' => ['Xhu', 'Z', 'Xuno'],
        ];
    }

    /**
     * @param string $name
     * @param string $lastname
     * @param string $alias
     * @return void
     * @dataProvider dataProviderForInvalidAlias
     */
    public function testGivenInvalidAliasWhenConstructThenExceptionIsThrown(
        string $name,
        string $lastname,
        string $alias
    ): void {
        $this->expectException(InvalidAlias::class);

        new FullName(
            new Name($name),
            new Lastname($lastname),
            new Alias($alias)
        );
    }

    public function dataProviderForInvalidAlias(): array
    {
        return [
            'less than 4 characters' => ['Lu', 'Xun', 'Lux'],
            'more than 10 characters' => ['Lu', 'Xun', 'BestStrategaEver']
        ];
    }
}
