<?php

namespace App\Repositories\Sorters\Icon;

use App\Repositories\Sorters\Sorter;
use Illuminate\Database\Eloquent\Builder;

class LabelSorter extends Sorter
{
  public function handle(Builder $query): void
  {
    $query->orderBy('label', $this->sortDirection->value);
  }
}
