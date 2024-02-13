<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Unit\SearchRequest;
use App\Http\Requests\Admin\Unit\CreateRequest;
use App\Http\Requests\Admin\Unit\UpdateRequest;
use App\Services\UnitService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UnitController extends Controller
{
  public function __construct(private UnitService $unitService)
  {
    $this->unitService = $unitService;
  }

  public function index(SearchRequest $request): View
  {
    $request['sort_direction'] = 'asc';
    $units = $this->unitService->findAll($request);

    return view('admin.units.index', [
      'units' => $units,
      'filter' => $request->collect('filter'),
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

    return redirect()->route('admin.units.index', $filter ? ['filter' => $filter] : []);
  }

  public function create(): View
  {
    return view('admin.units.create', []);
  }

  public function store(CreateRequest $request): RedirectResponse
  {
    $result  = $this->unitService->store($request);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.store.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.store.failed');
    }

    return redirect()->route('admin.units.index')->with($messageKey, $flashMessage);
  }

  public function view(int $id): View
  {
    $unit = $this->unitService->findOne($id);

    return view('admin.units.view', [
      'unit' => $unit,
    ]);
  }

  public function edit(int $id): View
  {
    $unit = $this->unitService->findOne($id);

    return view('admin.units.edit', [
      'unit' => $unit,
    ]);
  }

  public function update(int $id, UpdateRequest $request): RedirectResponse
  {
    $result = $this->unitService->update($id, $request);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.update.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.update.failed');
    }

    return redirect()->route('admin.units.view', ['id' => $id])->with($messageKey, $flashMessage);
  }

  public function destroy(int $id,): RedirectResponse
  {
    $result = $this->unitService->destroy($id);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.destroy.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.destroy.failed');
    }

    return redirect()->route('admin.units.index')->with($messageKey, $flashMessage);
  }
}
