<?php

namespace App\Http\Requests\Events;

use App\Enums\Attribute;
use App\Enums\EventType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $starts_at
 * @property string $ends_at
 * @property string $name
 * @property string $type
 * @property string $attribute
 * @property string $tune_id
 * @property string $is_key_story
 * @property string $story_chapter
 * @property array $event_cards
 */
class EventUpdate extends FormRequest
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
            'type' => [
                'required',
                new EnumValue(EventType::class),
            ],
            'attribute' => [
                'required',
                new EnumValue(Attribute::class),
            ],
            'tune_id' => [
                'sometimes',
                'nullable',
                'exists:tunes,id',
            ],
            'is_key_story' => [
                'boolean',
            ],
            'story_chapter' => [
                'nullable',
                'numeric',
            ],
            'event_cards.*' => [
                'nullable',
                'array',
            ],
            'event_members' => [
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
            'name' => 'イベント名',
            'type' => 'タイプ',
            'attribute' => '属性',
            'tune_id' => '書き下ろし楽曲',
            'is_key_story' => 'キーストーリーか',
            'story_chapter' => '第何章',
        ];
    }
}
