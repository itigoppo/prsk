<?php

namespace App\Repositories\Filters\Dialogue;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class IsRewardFilter extends Filter
{
  public function handle(Builder $query): void
  {
    $query->whereNotNull('note');
  }
}
