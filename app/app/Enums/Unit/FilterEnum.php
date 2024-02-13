<?php

namespace App\Enums\Unit;

use App\Repositories\Filters\Filter;
use App\Repositories\Filters\ValueFilter;
use App\Repositories\Filters\Unit\IsActiveFilter;
use App\Repositories\Filters\Unit\NameFilter;

enum FilterEnum: string
{
  case Name = 'name';
  case IsActive = 'is_active';

  public function create(ValueFilter|string|int|float $value): Filter
  {
    return match ($this) {
      self::Name => new NameFilter($value),
      self::IsActive => new IsActiveFilter($value),
    };
  }
}
