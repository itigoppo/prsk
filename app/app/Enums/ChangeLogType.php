<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static INTERACTION()
 */
final class ChangeLogType extends Enum
{
    const INTERACTION = 'interaction';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::INTERACTION => '掛け合い',
        ];

        foreach ($descriptions as $key => $description) {
            if ($value === $key) {
                return $description;
            }
        }

        return parent::getDescription($value);
    }
}
