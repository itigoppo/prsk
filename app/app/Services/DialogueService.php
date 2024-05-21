<?php

namespace App\Services;

use App\Http\Requests\Dialogue\StoreRequest;
use App\Http\Requests\Dialogue\SearchRequest;
use App\Http\Requests\Dialogue\UpdateRequest;
use App\Models\Dialogue;
use App\Repositories\DialogueRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class DialogueService
{

  public function __construct(private DialogueRepository $dialogueRepository)
  {
  }

  public function findPaginate(SearchRequest $request)
  {
    return $this->dialogueRepository->paginate($request->filters(), $request->sorter());
  }

  public function findAll(SearchRequest $request)
  {
    return $this->dialogueRepository->findAll($request->filters(), $request->sorter());
  }

  public function findOne(int|string $id)
  {
    return $this->dialogueRepository->findOneOrFail($id);
  }

  public function store(StoreRequest $request): bool
  {
    try {
      $request['file_path'] = \StorageUtil::upload($request, 'file', Dialogue::FILE_PATH);

      return $this->dialogueRepository->store($request);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }

  public function update(int $id, UpdateRequest $request): bool
  {
    try {
      $entity = $this->findOne($id);
      if ((!empty($entity->file) && $request->is_deleted) || (!empty($entity->file) && !empty($request->change_file))) {
        \StorageUtil::remove($entity->file);
      }
      $request['file_path'] = \StorageUtil::upload($request, 'change_file', Dialogue::FILE_PATH);

      return $this->dialogueRepository->update($entity, $request);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }

  public function destroy(int $id): bool
  {
    try {
      $entity = $this->findOne($id);
      if (!empty($entity->file)) {
        \StorageUtil::remove($entity->file);
      }

      return $this->dialogueRepository->destroy($entity);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }
}
