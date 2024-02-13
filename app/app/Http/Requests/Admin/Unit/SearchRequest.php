<?php

namespace App\Http\Requests\Admin\Unit;

use App\Collections\UnitFilterCollection;
use App\Enums\SortDirectionEnum;
use App\Enums\Unit\SorterEnum;
use App\Repositories\Sorters\Sorter;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function filters(): UnitFilterCollection
  {
    return new UnitFilterCollection($this->filter);
  }

  public function sorter(): Sorter
  {
    return $this
      ->sortBy()
      ->createSorter($this->sortDirection());
  }

  public function sortBy(): SorterEnum
  {
    $sortBy = SorterEnum::tryFrom($this->sort);

    if (is_null($sortBy)) {
      return SorterEnum::Created;
    }

    return $sortBy;
  }

  public function sortDirection(): SortDirectionEnum
  {
    $sortDirection = SortDirectionEnum::tryFrom($this->sort_direction);

    if (is_null($sortDirection)) {
      return SortDirectionEnum::Desc;
    }

    return $sortDirection;
  }
}
