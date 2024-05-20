<?php

namespace App\Enums\Member;

use App\Repositories\Filters\Filter;
use App\Repositories\Filters\ValueFilter;
use App\Repositories\Filters\Member\IsActiveFilter;
use App\Repositories\Filters\Member\IsActiveUnitFilter;
use App\Repositories\Filters\Member\NameFilter;
use App\Repositories\Filters\Member\UnitFilter;

enum FilterEnum: string
{
  case Name = 'name';
  case IsActive = 'is_active';
  case Unit = 'unit';
  case IsActiveUnit = 'is_active_unit';

  public function create(ValueFilter|string|int|float|array $value): Filter
  {
    return match ($this) {
      self::Name => new NameFilter($value),
      self::IsActive => new IsActiveFilter($value),
      self::Unit => new UnitFilter($value),
      self::IsActiveUnit => new IsActiveUnitFilter($value),
    };
  }
}
