<?php

namespace App\Repositories\Interfaces;

use App\Collections\UnitFilterCollection;
use App\Http\Requests\Unit\StoreRequest;
use App\Http\Requests\Unit\UpdateRequest;
use App\Models\Unit;
use App\Repositories\Sorters\Sorter;

interface UnitRepositoryInterface
{
  public function paginate(UnitFilterCollection $filters, ?Sorter $sorter);

  public function findAll(UnitFilterCollection $filters, ?Sorter $sorter);

  public function store(StoreRequest $request);

  public function findOneOrFail(int $id);

  public function update(Unit $entity, UpdateRequest $request);

  public function destroy(Unit $entity);
}
