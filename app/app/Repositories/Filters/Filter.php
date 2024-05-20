<?php

namespace App\Repositories\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
  public readonly mixed $value;

  public function __construct(ValueFilter|string|int|float|array $value)
  {
    $this->value = $value instanceof ValueFilter ? $value->cast() : $value;
  }

  abstract public function handle(Builder $query): void;
}
