<?php

namespace App\Http\Requests\Icon;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $path
 * @property string $name
 * @property string $mime_type
 * @property string $extension
 * @property string $label
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
      'path' => [
        'required',
      ],
      'name' => [
        'required',
      ],
      'mime_type' => [
        'required',
      ],
      'extension' => [
        'required',
      ],
      'label' => [],
    ];
  }

  /**
   * @return array
   */
  public function attributes()
  {
    return [
      'path' => 'ファイルパス',
      'name' => 'ファイル名',
      'mime_type' => 'Mimetype',
      'extension' => '拡張子',
      'label' => 'ラベル',
    ];
  }
}
