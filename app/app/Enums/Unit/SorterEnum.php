<?php

namespace App\Enums\Unit;

use App\Enums\SortDirectionEnum;
use App\Repositories\Sorters\Sorter;
use App\Repositories\Sorters\Unit\CreatedSorter;
use App\Repositories\Sorters\Unit\PrimaryKeySorter;

enum SorterEnum: string
{
  case Created = 'created_at';
  case Id = 'id';

  public function createSorter(SortDirectionEnum $sortDirection): Sorter
  {
    return match ($this) {
      self::Created => new CreatedSorter($sortDirection),
      self::Id => new PrimaryKeySorter($sortDirection),
    };
  }
}
