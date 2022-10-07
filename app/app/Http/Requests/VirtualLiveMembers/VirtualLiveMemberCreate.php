<?php

namespace App\Http\Requests\VirtualLiveMembers;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $virtual_live_id
 * @property int $member_id
 */
class VirtualLiveMemberCreate extends FormRequest
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
            'virtual_live_id' => 'バーチャルライブ',
            'member_id' => 'メンバー',
        ];
    }
}
