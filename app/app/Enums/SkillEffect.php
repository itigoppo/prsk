<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static SCORE_BOOST()
 * @method static static LIFE_RECOVER()
 * @method static static JUDGMENT()
 * @method static static SPECIAL_SCORE()
 * @method static static DEPENDS_ON_LIFE()
 * @method static static DEPENDS_ON_ACCURACY()
 * @method static static SPECIAL_LIFE()
 * @method static static UNIT_SCORE_BOOST()
 */
final class SkillEffect extends Enum
{
    const SPECIAL_SCORE = 'special score';
    const UNIT_SCORE_BOOST = 'unit score boost';
    const DEPENDS_ON_ACCURACY = 'depends on accuracy';
    const DEPENDS_ON_LIFE = 'depends on life';
    const SCORE_BOOST = 'score boost';
    const SPECIAL_LIFE = 'special life';
    const LIFE_RECOVER = 'life recovery';
    const JUDGMENT = 'judgment';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::SPECIAL_SCORE => 'スペスキ',
            self::UNIT_SCORE_BOOST => 'スコアアップ(ユニット)',
            self::DEPENDS_ON_ACCURACY => 'スコアアップ(精度依存)',
            self::DEPENDS_ON_LIFE => 'スコアアップ(ライフ依存)',
            self::SCORE_BOOST => 'スコアアップ',
            self::SPECIAL_LIFE => 'ライフ回復(大)',
            self::LIFE_RECOVER => 'ライフ回復',
            self::JUDGMENT => '判定強化',
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
            self::SCORE_BOOST => '#DB4D6D',
            self::LIFE_RECOVER => '#90B44B',
            self::JUDGMENT => '#6A4C9C',
            self::SPECIAL_SCORE => '#F7C242',
            self::DEPENDS_ON_LIFE => '#EB7A77',
            self::DEPENDS_ON_ACCURACY => '#E16B8C',
            self::SPECIAL_LIFE => '#7BA23F',
            self::UNIT_SCORE_BOOST => '#CB4042',
        ];

        foreach ($colors as $key => $color) {
            if ($value === $key) {
                return $color;
            }
        }

        return "#eee";
    }
}
