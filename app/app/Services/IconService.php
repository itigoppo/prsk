<?php

namespace App\Services;

use App\Http\Requests\Icon\StoreRequest;
use App\Http\Requests\Icon\SearchRequest;
use App\Models\Icon;
use App\Repositories\IconRepository;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IconService
{
  public function __construct(private IconRepository $iconRepository)
  {
    $this->iconRepository = $iconRepository;
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

      if (!Storage::disk('local')->exists(\StorageUtil::filePath($entity))) {
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

    $path = Storage::disk('local')->putFile(Icon::FILE_PATH, new File($file->getPathname()));
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
      Storage::disk('local')->delete($path);

      return false;
    }

    try {
      if (!$this->iconRepository->store(new StoreRequest($validator->validated()))) {
        Storage::disk('local')->delete($path);

        return false;
      }
    } catch (ValidationException $e) {
      Storage::disk('local')->delete($path);

      return false;
    }

    return true;
  }

  public function destroy(int $id): bool
  {
    try {
      $entity = $this->findOne($id);
      $path = \StorageUtil::filePath($entity);

      if (Storage::disk('local')->exists($path)) {
        if (!Storage::disk('local')->delete($path)) {
          return false;
        }
      }

      return $this->iconRepository->destroy($entity);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }
}
