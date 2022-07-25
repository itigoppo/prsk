<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static EXISTING()
 * @method static static PUBLICLY_SOLICITED()
 * @method static static NEWLY_WRITTEN()
 */
final class TuneType extends Enum
{
    const EXISTING = 'existing';
    const PUBLICLY_SOLICITED =   'publicly solicited';
    const NEWLY_WRITTEN = 'newly written';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::EXISTING => '既存曲',
            self::PUBLICLY_SOLICITED => '公募曲',
            self::NEWLY_WRITTEN => '書き下ろし曲',
        ];

        foreach ($descriptions as $key => $description) {
            if ($value === $key) {
                return $description;
            }
        }

        return parent::getDescription($value);
    }
}
