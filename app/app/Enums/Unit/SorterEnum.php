<?php

namespace App\Enums\Unit;

use App\Enums\SortDirectionEnum;
use App\Repositories\Sorters\Sorter;
use App\Repositories\Sorters\Unit\CreatedSorter;

enum SorterEnum: string
{
  case Created = 'created_at';

  public function createSorter(SortDirectionEnum $sortDirection): Sorter
  {
    return match ($this) {
      self::Created => new CreatedSorter($sortDirection),
    };
  }
}
