<?php

namespace App\Http\Requests\Admin\Unit;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $short
 * @property string $bg_color
 * @property string $color
 */
class CreateRequest extends FormRequest
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
      'name' => [
        'required',
        'max:20',
      ],
      'short' => [
        'required',
        'max:10',
      ],
      'bg_color' => [
        'required',
        'size:7',
      ],
      'color' => [
        'required',
        'size:7',
      ],
    ];
  }

  /**
   * @return array
   */
  public function attributes()
  {
    return [
      'name' => 'ユニット名',
      'short' => '短縮名',
      'bg_color' => 'ユニットカラーコード',
      'color' => 'テキストカラーコード',
    ];
  }
}
