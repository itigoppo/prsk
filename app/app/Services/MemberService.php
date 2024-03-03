<?php

namespace App\Services;

use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\SearchRequest;
use App\Http\Requests\Member\UpdateRequest;
use App\Repositories\MemberRepository;
use Exception;
use Illuminate\Support\Facades\Log;

class MemberService
{
  public function __construct(private MemberRepository $memberRepository)
  {
  }

  public function findPaginate(SearchRequest $request)
  {
    return $this->memberRepository->paginate($request->filters(), $request->sorter());
  }

  public function findAll(SearchRequest $request)
  {
    return $this->memberRepository->findAll($request->filters(), $request->sorter());
  }

  public function findOne(int|string $id)
  {
    return $this->memberRepository->findOneOrFail($id);
  }

  public function store(StoreRequest $request): bool
  {
    return $this->memberRepository->store($request);
  }

  public function update(int $id, UpdateRequest $request): bool
  {
    try {
      $entity = $this->findOne($id);

      return $this->memberRepository->update($entity, $request);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }

  public function destroy(int $id): bool
  {
    try {
      $entity = $this->findOne($id);

      return $this->memberRepository->destroy($entity);
    } catch (Exception $e) {
      Log::error($e);

      return false;
    }
  }
}
