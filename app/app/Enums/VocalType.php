<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SEKAI()
 * @method static static VIRTUAL_SINGER()
 * @method static static ANOTHER()
 */
final class VocalType extends Enum
{
    const SEKAI = 'sekai';
    const VIRTUAL_SINGER =   'virtual singer';
    const ANOTHER = 'another';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::SEKAI => 'セカイver.',
            self::VIRTUAL_SINGER => 'バーチャル・シンガーver.',
            self::ANOTHER => 'アナザーボーカルver.',
        ];

        foreach ($descriptions as $key => $description) {
            if ($value === $key) {
                return $description;
            }
        }

        return parent::getDescription($value);
    }
}
