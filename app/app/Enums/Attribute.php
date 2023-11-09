<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static CUTE()
 * @method static static COOL()
 * @method static static PURE()
 * @method static static HAPPY()
 * @method static static MYSTERIOUS()
 */
final class Attribute extends Enum
{
    const ALL = 'all';

    const CUTE = 'cute';
    const COOL = 'cool';
    const PURE = 'pure';
    const HAPPY = 'happy';
    const MYSTERIOUS = 'mysterious';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::ALL => 'すべて',
            self::CUTE => 'キュート',
            self::COOL => 'クール',
            self::PURE => 'ピュア',
            self::HAPPY => 'ハッピー',
            self::MYSTERIOUS => 'ミステリアス',
        ];

        foreach ($descriptions as $key => $description) {
            if ($value === $key) {
                return $description;
            }
        }

        return parent::getDescription($value);
    }

    public static function getColor($value): string
    {
        $colors = [
            self::ALL => '#91989F',
            self::CUTE => '#FF6CAA',
            self::COOL => '#3B53F9',
            self::PURE => '#02BB44',
            self::HAPPY => '#FC9011',
            self::MYSTERIOUS => '#7D62C6',
        ];

        foreach ($colors as $key => $color) {
            if ($value === $key) {
                return $color;
            }
        }

        return "#eee";
    }
}
