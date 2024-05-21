<?php

namespace App\Repositories\Filters\Dialogue;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class HasFileFilter extends Filter
{
  public function handle(Builder $query): void
  {
    if ($this->value === "1") {
      $query->whereNotNull('file');
    } elseif ($this->value === "0") {
      $query->whereNull('file');
    }
  }
}
