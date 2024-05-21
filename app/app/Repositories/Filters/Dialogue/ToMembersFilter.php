<?php

namespace App\Repositories\Filters\Dialogue;

use App\Repositories\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ToMembersFilter extends Filter
{
  public function handle(Builder $query): void
  {
    if (is_array($this->value) && in_array('null', $this->value, true)) {
      $query->where(function ($query) {
        $query->whereIn('to_member_id', $this->value)
          ->orWhereNull('to_member_id');
      });
    } else {
      $query->whereIn('to_member_id', $this->value);
    }
  }
}
