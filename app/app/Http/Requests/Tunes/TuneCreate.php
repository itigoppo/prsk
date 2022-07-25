<?php

namespace App\Http\Requests\Tunes;

use App\Enums\TuneType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $released_at
 * @property string $name
 * @property string $type
 * @property int $unit_id
 * @property string $has_3d_mv
 * @property string $has_2d_mv
 * @property string $has_original_mv
 * @property array $dancers
 * @property int $easy_level
 * @property int $normal_level
 * @property int $hard_level
 * @property int $expert_level
 * @property int $master_level
 * @property array $vocalists
 */
class TuneCreate extends FormRequest
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
            'name' => [
                'required',
            ],
            'type' => [
                'required',
                new EnumValue(TuneType::class),
            ],
            'unit_id' => [
                'nullable',
            ],
            'has_3d_mv' => [
                'boolean',
            ],
            'has_2d_mv' => [
                'boolean',
            ],
            'has_original_mv' => [
                'boolean',
            ],
            'dancers' => [
                'required_if:has_3d_mv,true',
            ],
            'easy_level' => [
                'nullable',
                'numeric',
            ],
            'normal_level' => [
                'nullable',
                'numeric',
            ],
            'hard_level' => [
                'nullable',
                'numeric',
            ],
            'expert_level' => [
                'nullable',
                'numeric',
            ],
            'master_level' => [
                'nullable',
                'numeric',
            ],
            'vocalists.*' => [
                'nullable',
                'array',
                function ($attribute, $value, $fail) {
                    if (!empty($value['type']) && !empty($value['key']) && !empty($value['members'])) {
                        return true;
                    }
                    if (!empty($value['type']) || !empty($value['key']) || !empty($value['members'])) {
                        $fail('入力が不足してます。');
                        return false;
                    }

                    return true;
                },
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'released_at' => '配信日',
            'name' => '曲名',
            'type' => '種別',
            'unit_id' => '歌唱ユニット',
            'has_3d_mv' => '3DMVの有無',
            'has_2d_mv' => '2DMVの有無',
            'has_original_mv' => '原曲MVの有無',
            'dancers' => 'MV参加メンバー',
            'easy_level' => 'EASY Lv',
            'normal_level' => 'NORMAL Lv',
            'hard_level' => 'HARD Lv',
            'expert_level' => 'EXPERT Lv',
            'master_level' => 'MASTER Lv',
            'vocalists.*.type' => 'ボーカル種別',
            'vocalists.*.key' => 'キー',
            'vocalists.*.members' => 'ボーカルメンバー',
        ];
    }
}

