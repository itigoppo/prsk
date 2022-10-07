<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VirtualLives\VirtualLiveCreate;
use App\Http\Requests\VirtualLives\VirtualLiveUpdate;

class VirtualLivesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        /** @var \App\Services\VirtualLivesService $virtualLivesService */
        $virtualLivesService = app()->make('VirtualLivesService');
        $virtualLives = $virtualLivesService->findPaginate();

        return view('admin.virtual-lives.index', [
            'virtualLives' => $virtualLives,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showCreateForm()
    {
        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        $tunes = $tunesService->findAll([], ['unit_id' => 'asc']);
        $units = $unitsService->findAll([
            'is_active' => true,
        ]);
        $members = $membersService->findAll();
        $events = $eventsService->findAll();

        return view('admin.virtual-lives.create', [
            'tunes' => $tunes,
            'units' => $units,
            'members' => $members,
            'events' => $events,
        ]);
    }

    /**
     * @param \App\Http\Requests\virtualLives\VirtualLiveCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(VirtualLiveCreate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\VirtualLivesService $virtualLivesService */
        $virtualLivesService = app()->make('VirtualLivesService');

        $result = $virtualLivesService->create($request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.lives.virtual.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $id)
    {
        /** @var \App\Services\VirtualLivesService $virtualLivesService */
        $virtualLivesService = app()->make('VirtualLivesService');

        $virtualLive = $virtualLivesService->findOne($id);

        return view('admin.virtual-lives.view', [
            'virtualLive' => $virtualLive,
            'breadcrumbs' => [
                'virtualLive' => $virtualLive,
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
        /** @var \App\Services\VirtualLivesService $virtualLivesService */
        $virtualLivesService = app()->make('VirtualLivesService');

        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        $virtualLive = $virtualLivesService->findOne($id);

        $tunes = $tunesService->findAll([], ['unit_id' => 'asc']);
        $units = $unitsService->findAll([
            'is_active' => true,
        ]);
        $members = $membersService->findAll();
        $events = $eventsService->findAll();

        return view('admin.virtual-lives.update', [
            'virtualLive' => $virtualLive,
            'tunes' => $tunes,
            'units' => $units,
            'members' => $members,
            'events' => $events,
            'breadcrumbs' => [
                'virtualLive' => $virtualLive,
            ],
        ]);
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\virtualLives\VirtualLiveUpdate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(int $id, VirtualLiveUpdate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\VirtualLivesService $virtualLivesService */
        $virtualLivesService = app()->make('VirtualLivesService');

        $result = $virtualLivesService->update($id, $request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.update_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.update_failed');
        }

        return redirect()->route('admin.lives.virtual.view', ['virtual_live_id' => $id])->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\VirtualLivesService $virtualLivesService */
        $virtualLivesService = app()->make('VirtualLivesService');

        $result = $virtualLivesService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.lives.virtual.index')->with($messageKey, $flashMessage);
    }
}
