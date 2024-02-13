<?php

namespace App\Services;

use App\Http\Requests\Admin\Unit\CreateRequest;
use App\Http\Requests\Admin\Unit\SearchRequest;
use App\Http\Requests\Admin\Unit\UpdateRequest;
use App\Repositories\UnitRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class UnitService
{
  public function __construct(private UnitRepository $unitRepository)
  {
    $this->unitRepository = $unitRepository;
  }

  public function findAll(SearchRequest $request)
  {
    return $this->unitRepository->paginate($request->filters(), $request->sorter());
  }

  public function findOne(int|string $id)
  {
    return $this->unitRepository->findOneOrFail($id);
  }

  public function store(CreateRequest $request): bool
  {
    return $this->unitRepository->store($request);
  }

  public function update(int $id, UpdateRequest $request): bool
  {
    try {
      $entity = $this->findOne($id);

      return $this->unitRepository->update($entity, $request);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }

  public function destroy(int $id): bool
  {
    try {
      $entity = $this->findOne($id);

      return $this->unitRepository->destroy($entity);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }
}
