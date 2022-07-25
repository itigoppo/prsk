<?php

namespace App\Http\Requests\Dancers;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $tune_id
 * @property int $member_id
 */
class DancerCreate extends FormRequest
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
            'tune_id' => '楽曲',
            'member_id' => 'メンバー',
        ];
    }
}
