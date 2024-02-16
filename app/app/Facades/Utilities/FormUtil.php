<?php

namespace App\Facades\Utilities;

use Illuminate\Support\Collection;

class FormUtil
{
  public static function createSelectOptions($array, $value, $label): Collection
  {
    $result = [[
      'label' => "選択してください",
      'value' => "",
    ]];
    foreach ($array as $item) {
      $result[] = [
        'label' => $item[$label],
        'value' => $item[$value],
      ];
    }

    return collect($result);
  }
}
