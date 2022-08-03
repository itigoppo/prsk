<?php

namespace App\Http\Requests\EventMembers;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $event_id
 * @property int $member_id
 */
class EventMemberCreate extends FormRequest
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
            'event_id' => 'イベント',
            'member_id' => 'メンバー',
        ];
    }
}
