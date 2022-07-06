<?php

namespace App\Http\Requests\ChangeLogs;

use App\Enums\ChangeLogType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $type
 * @property string $note
 * @property string $released_at
 */
class ChangeLogUpdate extends FormRequest
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
                new EnumValue(ChangeLogType::class),
            ],
            'note' => [
            ],
            'released_at' => [
                'date',
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'type' => '更新先',
            'note' => '更新内容',
            'released_at' => '更新日',
        ];
    }
}
