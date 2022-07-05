<?php

namespace App\Http\Requests\Interactions;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $from_member_id
 * @property string $from_line
 * @property int $to_member_id
 * @property string $to_line
 * @property string $file
 * @property string $file_path
 * @property string $note
 */
class InteractionCreate extends FormRequest
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
            'from_member_id' => [
            ],
            'from_line' => [
            ],
            'to_member_id' => [
            ],
            'to_line' => [
            ],
            'file' => [
            ],
            'file_path' => [
            ],
            'note' => [
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'from_member_id' => '応メンバー',
            'from_line' => '応セリフ',
            'to_member_id' => '答メンバー',
            'to_line' => '答メンバー',
            'file' => 'ファイル',
            'note' => '備考',
        ];
    }
}
