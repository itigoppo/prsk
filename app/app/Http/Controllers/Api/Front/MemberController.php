<?php

namespace App\Http\Controllers\Api\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Member\SearchRequest;
use App\Http\Resources\MemberResource;
use App\Services\MemberService;

class MemberController extends Controller
{
  public function __construct(
    private MemberService $memberService
  ) {
  }

  /**
   * Display a listing of the resource.
   */
  public function index(SearchRequest $request)
  {
    $filter = $request['filter'];
    $filter['is_active'] = 1;
    $filter['is_active_unit'] = 1;
    $request['filter'] = $filter;
    $request['sort'] = 'id';
    $request['sort_direction'] = 'asc';

    $members = $this->memberService->findAll($request);

    return MemberResource::collection($members);
  }
}
