<?php

namespace App\Services;

use App\Http\Requests\Icon\StoreRequest;
use App\Http\Requests\Icon\SearchRequest;
use App\Models\Icon;
use App\Repositories\IconRepository;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IconService
{
  public function __construct(private IconRepository $iconRepository)
  {
  }

  public function findPaginate(SearchRequest $request)
  {
    return $this->iconRepository->paginate($request->filters(), $request->sorter());
  }

  public function findAll(SearchRequest $request)
  {
    return $this->iconRepository->findAll($request->filters(), $request->sorter());
  }

  public function findOne(int|string $id)
  {
    return $this->iconRepository->findOneOrFail($id);
  }

  public function existsFile(int $id)
  {
    try {
      $entity = $this->findOne($id);

      if (!\StorageUtil::exists(\StorageUtil::iconFilePath($entity))) {
        throw new FileNotFoundException('icon record id: ' . $id);
      }

      return true;
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }

  public function store(Request $request): bool
  {
    $file = $request->file('file');

    if (empty($file)) {
      return false;
    }

    $path = \StorageUtil::upload($request, 'file', Icon::FILE_PATH);
    if (!$path) {
      return false;
    }

    $iconRequest = [
      'path' => Icon::FILE_PATH,
      'name' => str_replace(Icon::FILE_PATH . '/', '', $path),
      'mime_type' => $file->getMimeType(),
      'extension' => $file->extension(),
      'label' => $file->getClientOriginalName(),
    ];

    $validator = Validator::make($iconRequest, [
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
    ]);

    if ($validator->fails()) {
      \StorageUtil::remove($path);

      return false;
    }

    try {
      if (!$this->iconRepository->store(new StoreRequest($validator->validated()))) {
        \StorageUtil::remove($path);

        return false;
      }
    } catch (ValidationException $e) {
      \StorageUtil::remove($path);

      return false;
    }

    return true;
  }

  public function destroy(int $id): bool
  {
    try {
      $entity = $this->findOne($id);
      $path = \StorageUtil::iconFilePath($entity);
      \StorageUtil::remove($path);

      return $this->iconRepository->destroy($entity);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }
}
