<?php

namespace App\Repositories\Interfaces;

use App\Collections\MemberFilterCollection;
use App\Http\Requests\Member\StoreRequest;
use App\Http\Requests\Member\UpdateRequest;
use App\Models\Member;
use App\Repositories\Sorters\Sorter;

interface MemberRepositoryInterface
{
  public function paginate(MemberFilterCollection $filters, ?Sorter $sorter);

  public function findAll(MemberFilterCollection $filters, ?Sorter $sorter);

  public function store(StoreRequest $request);

  public function findOneOrFail(int $id);

  public function update(Member $entity, UpdateRequest $request);

  public function destroy(Member $entity);
}
