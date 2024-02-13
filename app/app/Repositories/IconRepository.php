<?php

namespace App\Repositories;

use App\Collections\IconFilterCollection;
use App\Http\Requests\Admin\Icon\CreateRequest;
use App\Models\Icon;
use App\Repositories\Interfaces\IconRepositoryInterface;
use App\Repositories\Sorters\Sorter;
use App\Traits\QueryBuilderTrait;

class IconRepository implements IconRepositoryInterface
{
  use QueryBuilderTrait;

  public function paginate(IconFilterCollection $filters, ?Sorter $sorter): \Illuminate\Contracts\Pagination\LengthAwarePaginator
  {
    $query = Icon::query();
    $filters->handle($query);
    $sorter->handle($query);

    // エラー出てるけど取れてるから気にしない
    return $query->paginate(18)->withQueryString();
  }

  public function store(CreateRequest $request)
  {
    $entity = new Icon();
    $entity->path = $request->path;
    $entity->name = $request->name;
    $entity->mime_type = $request->mime_type;
    $entity->extension = $request->extension;
    $entity->label = $request->label;

    return $entity->save();
  }

  /**
   * @throws \Illuminate\Database\Eloquent\ModelNotFoundException<\Illuminate\Database\Eloquent\Model>
   */
  public function findOneOrFail(int $id)
  {
    return Icon::query()->where($this->findOne($id))->firstOrFail();
  }

  public function destroy(Icon $entity)
  {
    return $entity->delete();
  }
}
