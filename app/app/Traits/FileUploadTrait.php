<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException;

trait FileUploadTrait
{
    /**
     * @param Request $request
     * @param string $field
     * @param string $uploadPath
     * @return string|null
     */
    public function fileCreate(Request $request, string $field, string $uploadPath = ''): ?string
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
     * @param Request $request
     * @param Model $entity
     * @param string $field
     * @param string $uploadPath
     * @return mixed|string|null
     */
    public function fileUpdate(Request $request, Model $entity, string $field, string $uploadPath = '')
    {
        $isDelete = $request->get('is_' . $field . '_delete', false);
        $nowFile = $entity->getAttributeValue($field);
        $return = $nowFile;

        if ($isDelete && Storage::disk('local')->exists($nowFile)) {
            if (!Storage::disk('local')->delete($nowFile)) {
                throw new CannotWriteFileException('ファイル操作に失敗しました');
            }

            $return = null;
        }

        $file = $request->file('change_' . $field);
        if (!empty($file)) {
            $path = Storage::disk('local')->putFile($uploadPath, new File($file->getPathname()));
            if (!$path) {
                throw new CannotWriteFileException('ファイル操作に失敗しました');
            }

            $return = $path;

            if (Storage::disk('local')->exists($nowFile)) {
                if (!Storage::disk('local')->delete($nowFile)) {
                    // 元ファイルの削除に失敗したなら新しいファイルも入れない
                    Storage::disk('local')->delete($path);

                    throw new CannotWriteFileException('ファイル操作に失敗しました');
                }
            }
        }

        return $return;
    }
}
