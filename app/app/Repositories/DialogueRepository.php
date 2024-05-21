<?php

namespace App\Repositories;

use App\Collections\DialogueFilterCollection;
use App\Http\Requests\Dialogue\StoreRequest;
use App\Http\Requests\Dialogue\UpdateRequest;
use App\Models\Dialogue;
use App\Repositories\Interfaces\DialogueRepositoryInterface;
use App\Repositories\Sorters\Sorter;
use App\Traits\QueryBuilderTrait;

class DialogueRepository implements DialogueRepositoryInterface
{
  use QueryBuilderTrait;

  public function paginate(DialogueFilterCollection $filters, ?Sorter $sorter): \Illuminate\Contracts\Pagination\LengthAwarePaginator
  {
    $query = Dialogue::query();
    $filters->handle($query);
    $sorter->handle($query);

    // エラー出てるけど取れてるから気にしない
    return $query->paginate(20)->withQueryString();
  }

  public function findAll(DialogueFilterCollection $filters, ?Sorter $sorter)
  {
    $query = Dialogue::query();
    $filters->handle($query);
    $sorter->handle($query);

    // エラー出てるけど取れてるから気にしない
    return $query->get();
  }

  public function store(StoreRequest $request)
  {
    $entity = new Dialogue();
    $entity->from_member_id = $request->get('from_member_id', null);
    $entity->from_line = $request->get('from_line', null);
    $entity->to_member_id = $request->get('to_member_id', null);
    $entity->to_line = $request->get('to_line', null);
    $entity->note = $request->get('note', null);
    $entity->file = $request->get('file_path', null);

    return $entity->save();
  }

  /**
   * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
   */
  public function findOneOrFail(int|string $id)
  {
    return Dialogue::query()->where($this->findOne($id))->firstOrFail();
  }

  public function update(Dialogue $entity, UpdateRequest $request)
  {
    $entity->from_member_id = $request->get('from_member_id', null);
    $entity->from_line = $request->get('from_line', null);
    $entity->to_member_id = $request->get('to_member_id', null);
    $entity->to_line = $request->get('to_line', null);
    $entity->note = $request->get('note', null);
    $entity->file = $request->get('file_path', null);

    return $entity->save();
  }

  public function destroy(Dialogue $entity)
  {
    return $entity->delete();
  }
}
