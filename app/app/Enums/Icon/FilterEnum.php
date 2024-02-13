<?php

namespace App\Enums\Icon;

use App\Repositories\Filters\Filter;
use App\Repositories\Filters\Icon\LabelFilter;
use App\Repositories\Filters\ValueFilter;

enum FilterEnum: string
{
  case Label = 'label';

  public function create(ValueFilter|string|int|float $value): Filter
  {
    return match ($this) {
      self::Label => new LabelFilter($value),
    };
  }
}
