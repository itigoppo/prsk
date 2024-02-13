<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait QueryBuilderTrait
{
  /**
   * @param int|string $id
   * @return array
   */
  public function findOne($id): array
  {
    if (Str::isUuid($id)) {
      $conditions = [
        'uuid' => $id,
      ];
    } else {
      $conditions = [
        'id' => $id,
      ];
    }

    return $conditions;
  }
}
