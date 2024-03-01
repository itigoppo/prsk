<?php

namespace App\Repositories;

use App\Collections\MemberFilterCollection;
use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\UpdateRequest;
use App\Models\Member;
use App\Repositories\Interfaces\MemberRepositoryInterface;
use App\Repositories\Sorters\Sorter;
use App\Traits\QueryBuilderTrait;

class MemberRepository implements MemberRepositoryInterface
{
  use QueryBuilderTrait;

  public function paginate(MemberFilterCollection $filters, ?Sorter $sorter): \Illuminate\Contracts\Pagination\LengthAwarePaginator
  {
    $query = Member::query();
    $filters->handle($query);
    $sorter->handle($query);

    // エラー出てるけど取れてるから気にしない
    return $query->paginate(10)->withQueryString();
  }

  public function findAll(MemberFilterCollection $filters, ?Sorter $sorter)
  {
    $query = Member::query();
    $filters->handle($query);
    $sorter->handle($query);

    // エラー出てるけど取れてるから気にしない
    return $query->get();
  }

  public function store(StoreRequest $request)
  {
    $entity = new Member();
    $entity->unit_id = $request->unit_id;
    $entity->icon_id = $request->icon_id;
    $entity->code = $request->code;
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
  public function findOneOrFail(int|string $id)
  {
    return Member::query()->where($this->findOne($id))->firstOrFail();
  }

  public function update(Member $entity, UpdateRequest $request)
  {
    $entity->unit_id = $request->unit_id;
    $entity->icon_id = $request->icon_id;
    $entity->code = $request->code;
    $entity->name = $request->name;
    $entity->short = $request->short;
    $entity->color = $request->color;
    $entity->bg_color = $request->bg_color;
    $entity->is_active = (bool) $request->get('is_active', false);

    return $entity->save();
  }

  public function destroy(Member $entity)
  {
    return $entity->delete();
  }
}
