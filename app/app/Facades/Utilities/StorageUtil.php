<?php

namespace App\Facades\Utilities;

use App\Models\Icon;

class StorageUtil
{
  public static function filePath(Icon $entity): string
  {
    return $entity->path . '/' . $entity->name;
  }

  public static function createToken(int $expire = 60): string
  {
    $expiration = now()->addSeconds($expire)->format('U');
    $token = password_hash($expiration . '-' .  config('custom.storage_key'), PASSWORD_DEFAULT);

    return $expiration . '-' . $token;
  }
}
