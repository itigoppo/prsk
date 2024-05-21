<?php

namespace App\Http\Requests\Dialogue;

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
class StoreRequest extends FormRequest
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
        'sometimes',
        'nullable',
        'exists:members,id',
      ],
      'from_line' => [
        'required',
      ],
      'to_member_id' => [
        'sometimes',
        'nullable',
        'exists:members,id',
      ],
      'to_line' => [
        'required',
      ],
      'file' => [
        'nullable',
        'mimetypes:audio/mp4,audio/mpeg',
      ],
      'file_path' => [
        'nullable',
      ],
      'note' => [
        'nullable',
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
      'to_line' => '答セリフ',
      'file' => 'ファイル',
      'note' => '備考',
    ];
  }
}
