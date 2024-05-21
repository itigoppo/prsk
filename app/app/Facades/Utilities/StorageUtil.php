<?php

namespace App\Facades\Utilities;

use App\Models\Icon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException;

class StorageUtil
{
  public static function iconFilePath(Icon $entity): string
  {
    return $entity->path . '/' . $entity->name;
  }

  public static function createToken(int $expire = 60): string
  {
    $expiration = now()->addSeconds($expire)->format('U');
    $token = password_hash($expiration . '-' .  config('custom.storage_key'), PASSWORD_DEFAULT);

    return $expiration . '-' . $token;
  }

  /**
   * @param string $file
   * @return bool
   */
  public static function exists(string $file)
  {
    return Storage::disk('local')->exists($file);
  }

  /**
   * @param  string  $path
   * @param  string|null  $name
   * @return \Symfony\Component\HttpFoundation\StreamedResponse
   */
  public static function download(string $file, $name = null, array $headers = [])
  {
    if (!Storage::disk('local')->exists($file)) {
      abort(404);
    }

    return Storage::disk('local')->download($file, $name, $headers);
  }

  /**
   * @param Request $request
   * @param string $field
   * @param string $uploadPath
   * @return string|null
   * @throws \Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException
   */
  public static function upload(Request $request, string $field, string $uploadPath = ''): ?string
  {
    $file = $request->file($field);
    $return = null;
    if (!empty($file)) {
      $path = Storage::disk('local')->putFile($uploadPath, new File($file->getPathname()));
      if (!$path) {
        throw new CannotWriteFileException('ファイル操作に失敗しました');
      }

      $return = $path;
    }

    return $return;
  }

  /**
   * @param string $file
   * @return bool
   * @throws \Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException
   */
  public static function remove(string $file)
  {
    if (Storage::disk('local')->exists($file)) {
      if (!Storage::disk('local')->delete($file)) {
        throw new CannotWriteFileException('ファイル操作に失敗しました');
      }
    }

    return true;
  }
}
