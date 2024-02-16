<?php

namespace App\Repositories\Filters\Member;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class UnitFilter extends Filter
{
  public function handle(Builder $query): void
  {
    $query->where('unit_id', $this->value);
  }
}
