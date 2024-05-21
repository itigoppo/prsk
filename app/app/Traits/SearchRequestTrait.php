<?php

namespace App\Traits;

use App\Http\Requests\Member\SearchRequest as MemberSearchRequest;

trait SearchRequestTrait
{
  /**
   * @return MemberSearchRequest
   */
  public function activeUnitMemberRequest(): MemberSearchRequest
  {
    $memberRequest = new MemberSearchRequest();
    $filter = $memberRequest['filter'];
    $filter['is_active'] = 1;
    $filter['is_active_unit'] = 1;
    $memberRequest['filter'] = $filter;
    $memberRequest['sort'] = 'id';
    $memberRequest['sort_direction'] = 'asc';

    return $memberRequest;
  }
}
