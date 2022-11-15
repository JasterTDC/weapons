<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\Test\Application\UseCase\Weapon;

use PHPUnit\Framework\TestCase;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Attribute;
use JasterTDC\Warriors\Domain\Shared\Exception\InvalidName;
use JasterTDC\Warriors\Domain\Shared\Exception\InvalidAlias;
use JasterTDC\Warriors\Domain\Shared\Exception\InvalidLastname;
use JasterTDC\Warriors\Domain\Shared\Level\Exception\InvalidLevel;
use JasterTDC\Warriors\Domain\Weapon\Attribute\AttributeCollection;
use JasterTDC\Warriors\Application\UseCase\Weapon\CreateWeaponUseCase;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Exception\InvalidAttributeName;
use JasterTDC\Warriors\Domain\Weapon\Attribute\Exception\InvalidAttributeLevel;
use JasterTDC\Warriors\Test\Domain\Weapon\WeaponType\ObjectMother\WeaponTypeMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother\AttributeObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother\AttributeLevelObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother\AttributeNameTypeObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\Name\ObjectMother\AttributeNameObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\ObjectMother\AttributeCollectionObjectMother;
use JasterTDC\Warriors\Test\Domain\Weapon\Attribute\AttributeType\ObjectMother\AttributeTypeObjectMother;

final class CreateWeaponUseCaseTest extends TestCase
{
    /**
     * @param string $weaponTypePrimitive
     * @param string $namePrimitive
     * @param string $lastnamePrimitive
     * @param string $aliasPrimitive
     * @param array $primitiveAttributes
     * @param AttributeCollection $expectedAttributeCollection
     * @return void
     * @dataProvider dataProviderWhenConstruct
     */
    public function testGivenValidWhenHappyPathThenReturnValid(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive,
        array $primitiveAttributes,
        AttributeCollection $expectedAttributeCollection
    ): void {
        $useCase = new CreateWeaponUseCase();

        $weapon = $useCase->handle(
            $weaponTypePrimitive,
            $namePrimitive,
            $lastnamePrimitive,
            $aliasPrimitive,
            $primitiveAttributes
        );

        $this->assertEquals($namePrimitive, $weapon->name());
        $this->assertEquals($lastnamePrimitive, $weapon->lastname());
        $this->assertEquals($aliasPrimitive, $weapon->alias());
        $this->assertEquals($expectedAttributeCollection->count(), $weapon->attributesCount());

        /** @var Attribute $attribute */
        foreach ($expectedAttributeCollection as $attribute) {
            $this->assertTrue($weapon->hasAttribute($attribute));
            $this->assertTrue($weapon->hasExactlyAttribute($attribute));
        }
    }

    public function dataProviderWhenConstruct(): array
    {
        return [
            'sword, Lu Xun' => [
                WeaponTypeMother::SWORD,
                'Lu', 
                'Xun',
                'Luxu',
                [
                    [
                        Attribute::NAME => AttributeNameObjectMother::ATTACK,
                        Attribute::LEVEL => 1
                    ],
                    [
                        Attribute::NAME => AttributeNameObjectMother::COURAGE,
                        Attribute::LEVEL => 1
                    ],
                    [
                        Attribute::NAME => AttributeNameObjectMother::DEATH,
                        Attribute::LEVEL => 1
                    ],
                    [
                        Attribute::NAME => AttributeNameObjectMother::FRENZY,
                        Attribute::LEVEL => 20
                    ]
                ],
                AttributeCollectionObjectMother::buildCustom(
                    AttributeObjectMother::buildCustom(
                        AttributeNameTypeObjectMother::buildCustom(
                            AttributeNameObjectMother::attack(),
                            AttributeTypeObjectMother::common()
                        ),
                        AttributeLevelObjectMother::buildCustom(1)
                    ),
                    AttributeObjectMother::buildCustom(
                        AttributeNameTypeObjectMother::buildCustom(
                            AttributeNameObjectMother::courage(),
                            AttributeTypeObjectMother::exceptional()
                        ),
                        AttributeLevelObjectMother::buildCustom(1)
                    ),
                    AttributeObjectMother::buildCustom(
                        AttributeNameTypeObjectMother::buildCustom(
                            AttributeNameObjectMother::death(),
                            AttributeTypeObjectMother::rare()
                        ),
                        AttributeLevelObjectMother::buildCustom(1)
                    ),
                    AttributeObjectMother::buildCustom(
                        AttributeNameTypeObjectMother::buildCustom(
                            AttributeNameObjectMother::frenzy(),
                            AttributeTypeObjectMother::unique()
                        ),
                        AttributeLevelObjectMother::buildCustom(20)
                    ),
                )
            ],
            'sword, Xin Xialing' => [
                WeaponTypeMother::SWORD,
                'Xin',
                'Xialing',
                'Xialing',
                [
                    [
                        Attribute::NAME => strtoupper(AttributeNameObjectMother::ATTACK),
                        Attribute::LEVEL => 1
                    ],
                ],
                AttributeCollectionObjectMother::buildCustom(
                    AttributeObjectMother::buildCustom(
                        AttributeNameTypeObjectMother::buildCustom(
                            AttributeNameObjectMother::attack(),
                            AttributeTypeObjectMother::common()
                        ),
                        AttributeLevelObjectMother::buildCustom(1)
                    ),
                )
            ],
            'axe, Xiapiomaturaea Ning' => [
                WeaponTypeMother::AXE,
                'Xiapiomaturaea',
                'Ning',
                'Gan Ning',
                [],
                AttributeCollectionObjectMother::buildEmpty()
            ],
            'axe, Lu Xhu' => [
                WeaponTypeMother::AXE,
                'Lu',
                'Xhu',
                'Kicho',
                [],
                AttributeCollectionObjectMother::buildEmpty()
            ],
            'dagger, Lu Zu' => [
                WeaponTypeMother::DAGGER,
                'Lu',
                'Zu',
                'Jubei',
                [],
                AttributeCollectionObjectMother::buildEmpty()
            ],
            'dagger, Xuo Taipei' => [
                WeaponTypeMother::DAGGER,
                'Xuo',
                'Taipei',
                'XuoTaipein',
                [],
                AttributeCollectionObjectMother::buildEmpty()
            ]
        ];
    }

    /**
     * @param string $weaponTypePrimitive
     * @param string $namePrimitive
     * @param string $lastnamePrimitive
     * @param string $aliasPrimitive
     * @return void
     * @dataProvider dataProviderForGivenInvalidNameWhenConstruct
     */
    public function testGivenInvalidNameWhenConstructThenExceptionIsThrown(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive
    ): void {
        $this->expectException(InvalidName::class);

        $useCase = new CreateWeaponUseCase();

        $useCase->handle($weaponTypePrimitive, $namePrimitive, $lastnamePrimitive, $aliasPrimitive, []);
    }

    public function dataProviderForGivenInvalidNameWhenConstruct(): array
    {
        return [
            'less than two characters' => [WeaponTypeMother::SWORD, 'X', 'Xialing', 'Xialing'],
            'more than 14 characters' => [WeaponTypeMother::SWORD, 'Xinoalpitamoxirtivuz', 'Xialing', 'Xialing']
        ];
    }

    /**
     * @param string $weaponTypePrimitive
     * @param string $namePrimitive
     * @param string $lastnamePrimitive
     * @param string $aliasPrimitive
     * @return void
     * @dataProvider dataProviderForGivenInvalidLastnameWhenConstruct
     */
    public function testGivenInvalidLastnameWhenConstructThenExceptionIsThrown(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive
    ): void {
        $this->expectException(InvalidLastname::class);

        $useCase = new CreateWeaponUseCase();

        $useCase->handle($weaponTypePrimitive, $namePrimitive, $lastnamePrimitive, $aliasPrimitive, []);
    }

    public function dataProviderForGivenInvalidLastnameWhenConstruct(): array
    {
        return [
            'less than two characters' => [WeaponTypeMother::SWORD, 'Xhu', 'Z', 'Xuno'],
        ];
    }

    /**
     * @param string $weaponTypePrimitive
     * @param string $namePrimitive
     * @param string $lastnamePrimitive
     * @param string $aliasPrimitive
     * @return void
     * @dataProvider dataProviderForInvalidAlias
     */
    public function testGivenInvalidAliasWhenConstructThenExceptionIsThrown(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive
    ): void {
        $this->expectException(InvalidAlias::class);

        $useCase = new CreateWeaponUseCase();

        $useCase->handle($weaponTypePrimitive, $namePrimitive, $lastnamePrimitive, $aliasPrimitive, []);
    }

    public function dataProviderForInvalidAlias(): array
    {
        return [
            'less than 4 characters' => [
                WeaponTypeMother::SWORD,
                'Lu',
                'Xun',
                'Lux'
            ],
            'more than 10 characters' => [
                WeaponTypeMother::SWORD,
                'Lu',
                'Xun',
                'BestStrategaEver'
            ]
        ];
    }

    public function testGivenInvalidAttributeNameWhenConstructThenExceptionIsThrown(): void
    {
        $this->expectException(InvalidAttributeName::class);

        // Given
        $weaponTypePrimitive = WeaponTypeMother::SWORD;
        $namePrimitive = 'Lu';
        $lastnamePrimitive = 'Xun';
        $aliasPrimitive = 'Kaido';
        $primitiveAttributes = [
            [
                Attribute::NAME => 'invalid',
                Attribute::LEVEL => 1
            ]
        ];

        $useCase = new CreateWeaponUseCase();

        $useCase->handle($weaponTypePrimitive, $namePrimitive, $lastnamePrimitive, $aliasPrimitive, $primitiveAttributes);
    }

    /** @dataProvider dataProviderForInvalidLevel */
    public function testGivenInvalidLevelWhenConstructThenExceptionIsThrown(
        string $weaponTypePrimitive,
        string $namePrimitive,
        string $lastnamePrimitive,
        string $aliasPrimitive,
        array $primitiveAttributes
    ): void {
        $this->expectException(InvalidLevel::class);

        $useCase = new CreateWeaponUseCase();

        $useCase->handle(
            $weaponTypePrimitive,
            $namePrimitive,
            $lastnamePrimitive,
            $aliasPrimitive,
            $primitiveAttributes
        );
    }

    public function dataProviderForInvalidLevel(): array
    {
        return [
            'Lu Xun Kaido, Sword, Level 0' => [
                WeaponTypeMother::SWORD,
                'Lu',
                'Xun',
                'Kaido',
                [
                    [
                        Attribute::NAME => AttributeNameObjectMother::ATTACK,
                        Attribute::LEVEL => 0
                    ]
                ],
            ],
            'Lu Xun Kaido, Sword, Level under 0' => [
                WeaponTypeMother::SWORD,
                'Lu',
                'Xun',
                'Kaido',
                [
                    [
                        Attribute::NAME => AttributeNameObjectMother::ATTACK,
                        Attribute::LEVEL => -10
                    ]
                ],
            ]
        ];
    }

    public function testGivenInvalidAttributeLevelWhenConstructThenExceptionIsThrown(): void
    {
        $this->expectException(InvalidAttributeLevel::class);

        // Given
        $weaponTypePrimitive = WeaponTypeMother::SWORD;
        $namePrimitive = 'Lu';
        $lastnamePrimitive = 'Xun';
        $aliasPrimitive = 'Kaido';
        $primitiveAttributes = [
            [
                Attribute::NAME => AttributeNameObjectMother::ATTACK,
                Attribute::LEVEL => 30
            ]
        ];

        $useCase = new CreateWeaponUseCase();

        $useCase->handle(
            $weaponTypePrimitive,
            $namePrimitive,
            $lastnamePrimitive,
            $aliasPrimitive,
            $primitiveAttributes
        );
    }
}
