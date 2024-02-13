<?php

namespace App\Enums;

use App\Repositories\Filters\ArrayValueFilter;
use App\Repositories\Filters\BooleanValueFilter;
use App\Repositories\Filters\ValueFilter;

enum FilterValueEnum: string
{
  case In = 'in';
  case Has = 'has';
  case Is = 'is';

  public function create(mixed $value): ValueFilter
  {
    return match ($this) {
      self::In => new ArrayValueFilter($value),
      self::Has => new BooleanValueFilter($value),
      self::Is => new BooleanValueFilter($value),
    };
  }
}
