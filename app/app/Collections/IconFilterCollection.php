<?php

namespace App\Collections;

use App\Enums\FilterValueEnum;
use App\Enums\Icon\FilterEnum;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class IconFilterCollection extends Collection
{
  public function handle(Builder $query): void
  {
    $this->map(function ($value, $filter) {
      $value = FilterValueEnum::tryFrom(Str::after($filter, ':'))?->create($value) ?: $value;

      return FilterEnum::tryFrom($filter)?->create($value);
    })
      ->filter()
      ->each(fn ($filter) => $filter->handle($query));
  }
}
