<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static MARATHON()
 * @method static static CHEERFUL()
 */
final class EventType extends Enum
{
    const MARATHON = 'marathon';
    const CHEERFUL = 'cheerful';
    const WORLD_LINK = 'world-link';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::MARATHON => 'マラソン',
            self::CHEERFUL => 'チアフルカーニバル',
            self::WORLD_LINK => 'ワールドリンク',
        ];

        foreach ($descriptions as $key => $description) {
            if ($value === $key) {
                return $description;
            }
        }

        return parent::getDescription($value);
    }
}
