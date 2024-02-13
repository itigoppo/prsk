<?php

namespace App\Repositories\Filters\Icon;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class LabelFilter extends Filter
{
  public function handle(Builder $query): void
  {
    $query->where('label', 'LIKE', "%$this->value%");
  }
}
