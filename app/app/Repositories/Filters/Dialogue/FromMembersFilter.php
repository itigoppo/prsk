<?php

namespace App\Repositories\Filters\Dialogue;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class FromMembersFilter extends Filter
{
  public function handle(Builder $query): void
  {
    if (is_array($this->value) && in_array('null', $this->value, true)) {
      $query->where(function ($query) {
        $query->whereIn('from_member_id', $this->value)
          ->orWhereNull('from_member_id');
      });
    } else {
      $query->whereIn('from_member_id', $this->value);
    }
  }
}
