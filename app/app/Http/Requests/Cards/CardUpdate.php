<?php

namespace App\Http\Requests\Cards;

use App\Enums\Attribute;
use App\Enums\Rarity;
use App\Enums\SkillEffect;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $released_at
 * @property string $rarity
 * @property string $attribute
 * @property string $name
 * @property int $member_id
 * @property string $skill_effect
 * @property string $skill_name
 * @property string $costume
 * @property bool $has_hair_style
 * @property int $performance
 * @property int $technique
 * @property int $stamina
 * @property string $normal_file
 * @property string $normal_file_path
 * @property bool $is_normal_file_delete
 * @property string $after_training_file
 * @property string $after_training_file_path
 * @property bool $is_after_training_file_delete
 */
class CardUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'released_at' => [
                'date',
            ],
            'rarity' => [
                'required',
                new EnumValue(Rarity::class),
            ],
            'attribute' => [
                'required',
                new EnumValue(Attribute::class),
            ],
            'name' => [
                'required',
            ],
            'member_id' => [
                'required',
                'exists:members,id',
            ],
            'skill_effect' => [
                'required',
                new EnumValue(SkillEffect::class),
            ],
            'skill_name' => [
                'nullable',
            ],
            'costume' => [
                'nullable',
            ],
            'has_hair_style' => [
                'boolean',
            ],
            'performance' => [
                'nullable',
                'numeric',
            ],
            'technique' => [
                'nullable',
                'numeric',
            ],
            'stamina' => [
                'nullable',
                'numeric',
            ],
            'normal_file' => [
            ],
            'normal_file_path' => [
            ],
            'is_normal_file_delete' => [
            ],
            'after_training_file' => [
            ],
            'after_training_file_path' => [
            ],
            'is_after_training_file_delete' => [
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'released_at' => '解放日',
            'rarity' => 'レアリティ',
            'attribute' => '属性',
            'name' => 'カード名',
            'member_id' => 'メンバー',
            'skill_effect' => 'スキルタイプ',
            'skill_name' => 'スキル名',
            'costume' => '衣装名',
            'has_hair_style' => 'ヘアスタイル',
            'performance' => 'パフォーマンス',
            'technique' => 'テクニック',
            'stamina' => 'スタミナ',
            'normal_file' => '特訓前画像',
            'after_training_file' => '特訓後画像',
        ];
    }
}
