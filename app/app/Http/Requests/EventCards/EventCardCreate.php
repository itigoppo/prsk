<?php

namespace App\Http\Requests\EventCards;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $event_id
 * @property bool $is_banner
 * @property int $card_id
 */
class EventCardCreate extends FormRequest
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
            'event_id' => [
                'required',
                'exists:events,id',
            ],
            'is_banner' => [
                'boolean',
            ],
            'card_id' => [
                'required',
                'exists:cards,id',
            ],
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'event_id' => 'イベント',
            'is_banner' => 'バナーキャラか',
            'card_id' => 'カード',
        ];
    }
}
