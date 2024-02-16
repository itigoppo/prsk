<?php

namespace App\Enums\Icon;

use App\Enums\SortDirectionEnum;
use App\Repositories\Sorters\Sorter;
use App\Repositories\Sorters\Icon\CreatedSorter;
use App\Repositories\Sorters\Icon\LabelSorter;
use App\Repositories\Sorters\Icon\PrimaryKeySorter;

enum SorterEnum: string
{
  case Created = 'created_at';
  case Id = 'id';
  case Label = 'label';

  public function createSorter(SortDirectionEnum $sortDirection): Sorter
  {
    return match ($this) {
      self::Created => new CreatedSorter($sortDirection),
      self::Id => new PrimaryKeySorter($sortDirection),
      self::Label => new LabelSorter($sortDirection),
    };
  }
}
