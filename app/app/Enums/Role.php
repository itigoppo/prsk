<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SUBSCRIBER()
 * @method static static CONTRIBUTOR()
 * @method static static AUTHOR()
 * @method static static EDITOR()
 * @method static static ADMINISTRATOR()
 */
final class Role extends Enum
{
    const SUBSCRIBER = 'subscriber';
    const CONTRIBUTOR = 'contributor';
    const AUTHOR = 'author';
    const EDITOR = 'editor';
    const ADMINISTRATOR = 'administrator';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::SUBSCRIBER => '購読者',
            self::CONTRIBUTOR => '寄稿者',
            self::AUTHOR => '投稿者',
            self::EDITOR => '編集者',
            self::ADMINISTRATOR => '管理者',
        ];

        foreach ($descriptions as $key => $description) {
            if ($value === $key) {
                return $description;
            }
        }

        return parent::getDescription($value);
    }
}
