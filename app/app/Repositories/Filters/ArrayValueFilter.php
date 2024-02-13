<?php

namespace App\Repositories\Filters;

class ArrayValueFilter extends ValueFilter
{
  public function cast(): mixed
  {
    return explode(',', $this->value);
  }
}
