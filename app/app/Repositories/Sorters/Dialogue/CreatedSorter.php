<?php

namespace App\Repositories\Sorters\Dialogue;

use App\Repositories\Sorters\Sorter;
use Illuminate\Database\Eloquent\Builder;

class CreatedSorter extends Sorter
{
  public function handle(Builder $query): void
  {
    $query->orderBy('created_at', $this->sortDirection->value);
  }
}
