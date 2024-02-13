<?php

namespace App\Repositories\Sorters;

use App\Enums\SortDirectionEnum;
use Illuminate\Database\Eloquent\Builder;

abstract class Sorter
{
  public function __construct(protected readonly SortDirectionEnum $sortDirection)
  {
  }

  abstract public function handle(Builder $query): void;
}
