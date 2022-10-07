<?php

namespace App\Http\Requests\VirtualLives;

use App\Enums\Attribute;
use App\Enums\EventType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $starts_at
 * @property string $ends_at
 * @property string $name
 * @property string $event_id
 * @property array $virtual_live_members
 * @property array $virtual_live_tunes
 */
class VirtualLiveCreate extends FormRequest
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
            'starts_at' => [
                'date',
            ],
            'ends_at' => [
                'date',
            ],
            'name' => [
                'required',
            ],
            'event_id' => [
                'sometimes',
                'nullable',
                'exists:events,id',
            ],
            'virtual_live_members' => [
                'nullable',
                'array',
            ],
            'virtual_live_tunes' => [
                'nullable',
                'array',
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'starts_at' => '開始日',
            'ends_at' => '終了日',
            'name' => 'ライブ名',
            'event_id' => 'イベント',
        ];
    }
}
