<?php

namespace App\Enums\Dialogue;

use App\Repositories\Filters\Dialogue\FromMembersFilter;
use App\Repositories\Filters\Dialogue\HasFileFilter;
use App\Repositories\Filters\Dialogue\IsRewardFilter;
use App\Repositories\Filters\Dialogue\ToMembersFilter;
use App\Repositories\Filters\Filter;
use App\Repositories\Filters\ValueFilter;

enum FilterEnum: string
{
  case IsReward = 'is_reward';
  case HasFile = 'has_file';
  case FromMembers = 'from_member_ids';
  case ToMembers = 'to_member_ids';

  public function create(ValueFilter|string|int|float|array $value): Filter
  {
    return match ($this) {
      self::IsReward => new IsRewardFilter($value),
      self::HasFile => new HasFileFilter($value),
      self::FromMembers => new FromMembersFilter($value),
      self::ToMembers => new ToMembersFilter($value),
    };
  }
}
