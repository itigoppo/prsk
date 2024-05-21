<?php

namespace App\Enums\Dialogue;

use App\Enums\SortDirectionEnum;
use App\Repositories\Sorters\Sorter;
use App\Repositories\Sorters\Dialogue\CreatedSorter;
use App\Repositories\Sorters\Dialogue\PrimaryKeySorter;

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
