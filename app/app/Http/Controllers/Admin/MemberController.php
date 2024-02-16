<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Icon\SearchRequest as IconSearchRequest;
use App\Http\Requests\Admin\Member\SearchRequest;
use App\Http\Requests\Admin\Member\StoreRequest;
use App\Http\Requests\Admin\Member\UpdateRequest;
use App\Http\Requests\Admin\Unit\SearchRequest as UnitSearchRequest;
use App\Services\IconService;
use App\Services\MemberService;
use App\Services\UnitService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MemberController extends Controller
{
  public function __construct(
    private MemberService $memberService,
    private UnitService $unitService,
    private IconService $iconService
  ) {
  }

  public function index(SearchRequest $request): View
  {
    $request['sort'] = 'id';
    $request['sort_direction'] = 'asc';
    $members = $this->memberService->findPaginate($request);

    $unitRequest = new UnitSearchRequest();
    $unitRequest['sort_direction'] = 'asc';
    $units = $this->unitService->findAll($unitRequest);

    return view('admin.members.index', [
      'members' => $members,
      'filter' => $request->collect('filter'),
      'unitOptions' => \FormUtil::createSelectOptions($units, 'id', 'name'),
    ]);
  }

  public function search(Request $request): RedirectResponse
  {
    $filter = array_filter(
      $request->collect('filter')->toArray(),
      function ($value) {
        return !(is_null($value) || $value === "");
      }
    );

    return redirect()->route('admin.members.index', $filter ? ['filter' => $filter] : []);
  }

  public function create(): View
  {
    $unitRequest = new UnitSearchRequest();
    $unitRequest['sort_direction'] = 'asc';
    $units = $this->unitService->findAll($unitRequest);

    $iconRequest = new IconSearchRequest();
    $unitRequest['sort'] = 'label';
    $unitRequest['sort_direction'] = 'asc';
    $icons = $this->iconService->findAll($iconRequest);

    return view('admin.members.create', [
      'unitOptions' => \FormUtil::createSelectOptions($units, 'id', 'name'),
      'iconOptions' => \FormUtil::createSelectOptions($icons, 'id', 'label'),
    ]);
  }

  public function store(StoreRequest $request): RedirectResponse
  {
    $result  = $this->memberService->store($request);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.store.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.store.failed');
    }

    return redirect()->route('admin.members.index')->with($messageKey, $flashMessage);
  }

  public function view(int $id, int $memberId): View
  {
    $member = $this->memberService->findOne($memberId);

    return view('admin.members.view', [
      'member' => $member,
    ]);
  }

  public function edit(int $id, int $memberId): View
  {
    $member = $this->memberService->findOne($memberId);

    $unitRequest = new UnitSearchRequest();
    $unitRequest['sort_direction'] = 'asc';
    $units = $this->unitService->findAll($unitRequest);

    $iconRequest = new IconSearchRequest();
    $unitRequest['sort'] = 'label';
    $unitRequest['sort_direction'] = 'asc';
    $icons = $this->iconService->findAll($iconRequest);

    return view('admin.members.edit', [
      'member' => $member,
      'unitOptions' => \FormUtil::createSelectOptions($units, 'id', 'name'),
      'iconOptions' => \FormUtil::createSelectOptions($icons, 'id', 'label'),
    ]);
  }

  public function update(int $id, int $memberId, UpdateRequest $request): RedirectResponse
  {
    $result = $this->memberService->update($memberId, $request);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.update.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.update.failed');
    }

    return redirect()->route('admin.units.members.view', ['id' => $request->unit_id, 'member_id' => $memberId])->with($messageKey, $flashMessage);
  }

  public function destroy(int $id, int $memberId): RedirectResponse
  {
    $result = $this->memberService->destroy($memberId);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.destroy.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.destroy.failed');
    }

    return redirect()->route('admin.members.index')->with($messageKey, $flashMessage);
  }
}
