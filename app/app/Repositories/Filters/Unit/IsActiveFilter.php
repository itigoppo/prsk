<?php

namespace App\Repositories\Filters\Unit;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class IsActiveFilter extends Filter
{
  public function handle(Builder $query): void
  {
    $query->where('is_active', $this->value);
  }
}
