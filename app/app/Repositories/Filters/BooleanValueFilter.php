<?php

namespace App\Repositories\Filters;

class BooleanValueFilter extends ValueFilter
{
  public function cast(): mixed
  {
    return filter_var($this->value, FILTER_VALIDATE_BOOLEAN);
  }
}
