<?php

namespace App\Http\Controllers\Admin;

use App\Enums\TuneType;
use App\Enums\VocalType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tunes\TuneCreate;
use App\Http\Requests\Tunes\TuneUpdate;

class TunesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        $tunes = $tunesService->findPaginate([], ['id' => 'desc']);

        return view('admin.tunes.index', [
            'tunes' => $tunes,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showCreateForm()
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $units = $unitsService->findAll();
        $members = $membersService->findAll();

        return view('admin.tunes.create', [
            'units' => $units,
            'members' => $members,
            'tuneTypes' => TuneType::asSelectArray(),
            'vocalTypes' => VocalType::asSelectArray(),
        ]);
    }

    /**
     * @param \App\Http\Requests\tunes\TuneCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(TuneCreate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        $result = $tunesService->create($request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.tunes.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $id)
    {
        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        $tune = $tunesService->findOne($id);

        return view('admin.tunes.view', [
            'tune' => $tune,
            'breadcrumbs' => [
                'tune' => $tune,
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
        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $tune = $tunesService->findOne($id);
        $units = $unitsService->findAll();
        $members = $membersService->findAll();

        return view('admin.tunes.update', [
            'tune' => $tune,
            'units' => $units,
            'members' => $members,
            'tuneTypes' => TuneType::asSelectArray(),
            'vocalTypes' => VocalType::asSelectArray(),
            'breadcrumbs' => [
                'tune' => $tune,
            ],
        ]);
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\tunes\TuneUpdate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(int $id, TuneUpdate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        $result = $tunesService->update($id, $request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.update_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.update_failed');
        }

        return redirect()->route('admin.tunes.view', ['tune_id' => $id])->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        $result = $tunesService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.tunes.index')->with($messageKey, $flashMessage);
    }
}
