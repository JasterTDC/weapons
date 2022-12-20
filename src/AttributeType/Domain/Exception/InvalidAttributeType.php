<?php

declare(strict_types=1);

namespace JasterTDC\Warriors\AttributeType\Domain\Exception;

use Exception;

final class InvalidAttributeType extends Exception
{
    private const MSG_FROM_INVALID_ATTRIBUTE_TYPE = '%s is not a valid attribute type';

    public static function buildFromInvalidAttributeType(string $attributeType): self
    {
        return new self(
            sprintf(self::MSG_FROM_INVALID_ATTRIBUTE_TYPE, $attributeType)
        );
    }
}
