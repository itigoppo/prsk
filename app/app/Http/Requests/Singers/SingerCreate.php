<?php

namespace App\Http\Requests\Singers;


use App\Enums\VocalType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $type
 * @property string $vocal_key
 * @property int $tune_id
 * @property int $member_id
 */
class SingerCreate extends FormRequest
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
            'type' => [
                'required',
                new EnumValue(VocalType::class),
            ],
            'vocal_key' => [
            ],
            'tune_id' => [
                'required',
                'exists:tunes,id',
            ],
            'member_id' => [
                'required',
                'exists:members,id',
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'type' => 'ボーカル種別',
            'vocal_key' => '種別キー',
            'tune_id' => '楽曲',
            'member_id' => 'メンバー',
        ];
    }
}
