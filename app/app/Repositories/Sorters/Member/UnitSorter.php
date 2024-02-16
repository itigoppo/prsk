<?php

namespace App\Repositories\Sorters\Member;

use App\Repositories\Sorters\Sorter;
use Illuminate\Database\Eloquent\Builder;

class UnitSorter extends Sorter
{
  public function handle(Builder $query): void
  {
    $query->orderBy('unit_id', $this->sortDirection->value);
  }
}
