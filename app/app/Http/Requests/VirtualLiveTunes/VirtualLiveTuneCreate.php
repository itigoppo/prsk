<?php

namespace App\Http\Requests\VirtualLiveTunes;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $virtual_live_id
 * @property int $tune_id
 */
class VirtualLiveTuneCreate extends FormRequest
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
            'virtual_live_id' => [
                'required',
                'exists:virtual_lives,id',
            ],
            'tune_id' => [
                'required',
                'exists:tunes,id',
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'virtual_live_id' => 'バーチャルライブ',
            'tune_id' => '楽曲',
        ];
    }
}
