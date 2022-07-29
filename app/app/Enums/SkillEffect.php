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
    const SCORE_BOOST = 'score boost';
    const LIFE_RECOVER = 'life recovery';
    const JUDGMENT = 'judgment';
    const SPECIAL_SCORE = 'special score';
    const DEPENDS_ON_LIFE = 'depends on life';
    const DEPENDS_ON_ACCURACY = 'depends on accuracy';
    const SPECIAL_LIFE = 'special life';
    const UNIT_SCORE_BOOST = 'unit score boost';

    /**
     * Get the description for an enum value.
     *
     * @param  mixed  $value
     * @return string
     */
    public static function getDescription($value): string
    {
        $descriptions = [
            self::SCORE_BOOST => 'スコアアップ',
            self::LIFE_RECOVER => 'ライフ回復',
            self::JUDGMENT => '判定強化',
            self::SPECIAL_SCORE => 'スペスキ',
            self::DEPENDS_ON_LIFE => 'スコアアップ(ライフ依存)',
            self::DEPENDS_ON_ACCURACY => 'スコアアップ(精度依存)',
            self::SPECIAL_LIFE => 'ライフ回復(大)',
            self::UNIT_SCORE_BOOST => 'スコアアップ(ユニット)',
        ];

        foreach ($descriptions as $key => $description) {
            if ($value === $key) {
                return $description;
            }
        }

        return parent::getDescription($value);
    }
}
