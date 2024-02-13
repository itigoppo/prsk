<?php

namespace App\Repositories\Interfaces;

use App\Collections\UnitFilterCollection;
use App\Http\Requests\Admin\Unit\CreateRequest;
use App\Http\Requests\Admin\Unit\UpdateRequest;
use App\Models\Unit;
use App\Repositories\Sorters\Sorter;

interface UnitRepositoryInterface
{
  public function paginate(UnitFilterCollection $filters, ?Sorter $sorter);

  public function store(CreateRequest $request);

  public function findOneOrFail(int $id);

  public function update(Unit $entity, UpdateRequest $request);

  public function destroy(Unit $entity);
}
