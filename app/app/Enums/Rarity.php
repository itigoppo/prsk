<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static STAR_ONE()
 * @method static static STAR_TWO()
 * @method static static STAR_THREE()
 * @method static static STAR_FOUR()
 * @method static static BIRTHDAY()
 */
final class Rarity extends Enum
{
    const STAR_ONE = 'one';
    const STAR_TWO = 'two';
    const STAR_THREE = 'three';
    const STAR_FOUR = 'four';
    const BIRTHDAY = 'birthday';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::STAR_ONE => '★1',
            self::STAR_TWO => '★2',
            self::STAR_THREE => '★3',
            self::STAR_FOUR => '★4',
            self::BIRTHDAY => 'BD',
        ];

        foreach ($descriptions as $key => $description) {
            if ($value === $key) {
                return $description;
            }
        }

        return parent::getDescription($value);
    }
}
