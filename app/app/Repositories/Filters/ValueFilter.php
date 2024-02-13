<?php

namespace App\Repositories\Filters;

abstract class ValueFilter
{
  public function __construct(public readonly mixed $value)
  {
  }

  abstract public function cast(): mixed;
}
