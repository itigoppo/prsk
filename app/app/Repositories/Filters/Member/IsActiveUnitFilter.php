<?php

namespace App\Repositories\Filters\Member;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class IsActiveUnitFilter extends Filter
{
  public function handle(Builder $query): void
  {
    $query->whereHas('unit', function (Builder $query) {
      $query->where('is_active', $this->value);
    });
  }
}
