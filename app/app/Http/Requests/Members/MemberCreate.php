<?php

namespace App\Http\Requests\Members;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $unit_id
 * @property string $icon_id
 * @property string $code
 * @property string $name
 * @property string $short
 * @property string $bg_color
 * @property string $color
 * @property string $is_active
 */
class MemberCreate extends FormRequest
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
            'unit_id' => [
                'required',
                'exists:units,id',
            ],
            'icon_id' => [
                'exists:icons,id',
            ],
            'code' => [
                'required',
                'max:20',
            ],
            'name' => [
                'required',
                'max:20',
            ],
            'short' => [
                'required',
                'max:10',
            ],
            'bg_color' => [
                'required',
                'size:7',
            ],
            'color' => [
                'required',
                'size:7',
            ],
            'is_active' => [
                'boolean',
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'unit_id' => 'ユニットID',
            'code' => 'メンバーコード',
            'name' => 'メンバー名',
            'short' => '短縮名',
            'bg_color' => 'メンバーカラーコード',
            'color' => 'テキストカラーコード',
            'is_active' => 'アクティブ',
        ];
    }
}
