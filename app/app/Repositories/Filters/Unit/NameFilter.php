<?php

namespace App\Repositories\Filters\Unit;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class NameFilter extends Filter
{
  public function handle(Builder $query): void
  {
    $query->where('name', 'LIKE', "%$this->value%");
  }
}
