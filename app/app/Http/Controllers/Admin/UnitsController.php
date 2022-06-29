<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Units\UnitCreate;
use App\Http\Requests\Units\UnitUpdate;

class UnitsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');
        $units = $unitsService->findAll();

        return view('admin.units.index', [
            'units' => $units,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showCreateForm()
    {
        return view('admin.units.create', [
        ]);
    }

    /**
     * @param \App\Http\Requests\units\UnitCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(UnitCreate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        $result = $unitsService->create($request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.units.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $id)
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        $unit = $unitsService->findOne($id);

        return view('admin.units.view', [
            'unit' => $unit,
            'breadcrumbs' => [
                'unit' => $unit,
            ],
        ]);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showUpdateForm(int $id)
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        $unit = $unitsService->findOne($id);

        return view('admin.units.update', [
            'unit' => $unit,
            'breadcrumbs' => [
                'unit' => $unit,
            ],
        ]);
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\units\UnitUpdate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(int $id, UnitUpdate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        $result = $unitsService->update($id, $request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.update_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.update_failed');
        }

        return redirect()->route('admin.units.view', ['unit_id' => $id])->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        $result = $unitsService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.units.index')->with($messageKey, $flashMessage);
    }
}
