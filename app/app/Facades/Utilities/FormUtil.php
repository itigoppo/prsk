<?php

namespace App\Facades\Utilities;

use Illuminate\Support\Collection;

class FormUtil
{
  public static function createSelectOptions($array, $value, $label, $hasBlankOption = true, $bgColor = null, $color = null): Collection
  {
    $result = [];

    if ($hasBlankOption) {
      $result[] = [
        'label' => "選択してください",
        'value' => "",
        'bgColor' => null,
        'color' => null,
      ];
    }
    foreach ($array as $item) {
      $result[] = [
        'label' => $item[$label],
        'value' => $item[$value],
        'bgColor' => $bgColor ? $item[$bgColor] : null,
        'color' => $color ? $item[$color] : null,
      ];
    }

    return collect($result);
  }
}
