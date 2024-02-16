<?php

namespace App\Repositories\Interfaces;

use App\Collections\IconFilterCollection;
use App\Http\Requests\Admin\Icon\StoreRequest;
use App\Models\Icon;
use App\Repositories\Sorters\Sorter;

interface IconRepositoryInterface
{
  public function paginate(IconFilterCollection $filters, ?Sorter $sorter);

  public function findAll(IconFilterCollection $filters, ?Sorter $sorter);

  public function store(StoreRequest $request);

  public function findOneOrFail(int $id);

  public function destroy(Icon $entity);
}
