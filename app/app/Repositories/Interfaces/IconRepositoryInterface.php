<?php

namespace App\Repositories\Interfaces;

use App\Collections\IconFilterCollection;
use App\Http\Requests\Admin\Icon\CreateRequest;
use App\Models\Icon;
use App\Repositories\Sorters\Sorter;

interface IconRepositoryInterface
{
  public function paginate(IconFilterCollection $filters, ?Sorter $sorter);

  public function store(CreateRequest $request);

  public function findOneOrFail(int $id);

  public function destroy(Icon $entity);
}
