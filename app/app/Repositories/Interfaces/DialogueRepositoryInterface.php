<?php

namespace App\Repositories\Interfaces;

use App\Collections\DialogueFilterCollection;
use App\Http\Requests\Dialogue\StoreRequest;
use App\Http\Requests\Dialogue\UpdateRequest;
use App\Models\Dialogue;
use App\Repositories\Sorters\Sorter;

interface DialogueRepositoryInterface
{
  public function paginate(DialogueFilterCollection $filters, ?Sorter $sorter);

  public function findAll(DialogueFilterCollection $filters, ?Sorter $sorter);

  public function store(StoreRequest $request);

  public function findOneOrFail(int $id);

  public function update(Dialogue $entity, UpdateRequest $request);

  public function destroy(Dialogue $entity);
}
