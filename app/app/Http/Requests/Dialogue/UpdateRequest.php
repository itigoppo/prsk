<?php

namespace App\Http\Requests\Dialogue;

/**
 * @property int $from_member_id
 * @property string $from_line
 * @property int $to_member_id
 * @property string $to_line
 * @property string $file
 * @property string $file_path
 * @property string $note
 * @property bool $is_deleted
 * @property string $change_file
 */
class UpdateRequest extends StoreRequest
{

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return array_merge(parent::rules(), [
      'change_file' => [
        'nullable',
        'mimetypes:audio/mp4,audio/mpeg',
      ],
      'is_deleted' => [
        'nullable',
        'boolean',
      ],
    ]);
  }

  /**
   * @return array
   */
  public function attributes()
  {
    return array_merge(parent::rules(), [
      'change_file' => 'ファイル',
    ]);
  }
}
