<?php

namespace App\Repositories;

use App\Collections\UnitFilterCollection;
use App\Http\Requests\Unit\StoreRequest;
use App\Http\Requests\Unit\UpdateRequest;
use App\Models\Unit;
use App\Repositories\Interfaces\UnitRepositoryInterface;
use App\Repositories\Sorters\Sorter;
use App\Traits\QueryBuilderTrait;

class UnitRepository implements UnitRepositoryInterface
{
  use QueryBuilderTrait;

  public function paginate(UnitFilterCollection $filters, ?Sorter $sorter): \Illuminate\Contracts\Pagination\LengthAwarePaginator
  {
    $query = Unit::query();
    $filters->handle($query);
    $sorter->handle($query);

    // エラー出てるけど取れてるから気にしない
    return $query->paginate(10)->withQueryString();
  }

  public function findAll(UnitFilterCollection $filters, ?Sorter $sorter)
  {
    $query = Unit::query();
    $filters->handle($query);
    $sorter->handle($query);

    return $query->get();
  }

  public function store(StoreRequest $request)
  {
    $entity = new Unit();
    $entity->name = $request->name;
    $entity->short = $request->short;
    $entity->color = $request->color;
    $entity->bg_color = $request->bg_color;
    $entity->is_active = (bool) $request->get('is_active', false);

    return $entity->save();
  }

  /**
   * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
   */
  public function findOneOrFail(int $id)
  {
    return Unit::query()->where($this->findOne($id))->firstOrFail();
  }

  public function update(Unit $entity, UpdateRequest $request)
  {
    $entity->name = $request->name;
    $entity->short = $request->short;
    $entity->color = $request->color;
    $entity->bg_color = $request->bg_color;
    $entity->is_active = (bool) $request->get('is_active', false);

    return $entity->save();
  }

  public function destroy(Unit $entity)
  {
    return $entity->delete();
  }
}
