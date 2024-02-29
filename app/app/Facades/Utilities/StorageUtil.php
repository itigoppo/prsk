<?php

namespace App\Facades\Utilities;

use App\Models\Icon;

class StorageUtil
{
  public static function filePath(Icon $entity): string
  {
    return $entity->path . '/' . $entity->name;
  }
}
