<?php

namespace App\Enums\Member;

use App\Enums\SortDirectionEnum;
use App\Repositories\Sorters\Sorter;
use App\Repositories\Sorters\Member\CreatedSorter;
use App\Repositories\Sorters\Member\PrimaryKeySorter;
use App\Repositories\Sorters\Member\UnitSorter;

enum SorterEnum: string
{
  case Created = 'created_at';
  case Id = 'id';
  case Unit = 'unit';

  public function createSorter(SortDirectionEnum $sortDirection): Sorter
  {
    return match ($this) {
      self::Created => new CreatedSorter($sortDirection),
      self::Id => new PrimaryKeySorter($sortDirection),
      self::Unit => new UnitSorter($sortDirection),
    };
  }
}
