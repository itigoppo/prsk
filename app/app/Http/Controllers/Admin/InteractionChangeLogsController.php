<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ChangeLogType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeLogs\ChangeLogCreate;
use App\Http\Requests\ChangeLogs\ChangeLogUpdate;

class InteractionChangeLogsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $request = [
            'tp' => ChangeLogType::INTERACTION,
        ];
        $changeLogs = $changeLogsService->findPaginate($request, []);

        return view('admin.change-logs.index', [
            'changeLogs' => $changeLogs,
            'changeLogType' => ChangeLogType::INTERACTION(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showCreateForm()
    {
        return view('admin.change-logs.create', [
            'changeLogType' => ChangeLogType::INTERACTION(),
        ]);
    }

    /**
     * @param \App\Http\Requests\changeLogs\ChangeLogCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(ChangeLogCreate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $result = $changeLogsService->create($request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.interactions.logs.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $id)
    {
        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $changeLog = $changeLogsService->findOne($id);

        return view('admin.change-logs.view', [
            'changeLog' => $changeLog,
            'changeLogType' => ChangeLogType::INTERACTION(),
            'breadcrumbs' => [
                'changeLog' => $changeLog,
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
        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $changeLog = $changeLogsService->findOne($id);

        return view('admin.change-logs.update', [
            'changeLog' => $changeLog,
            'changeLogType' => ChangeLogType::INTERACTION(),
            'breadcrumbs' => [
                'changeLog' => $changeLog,
            ],
        ]);
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\changeLogs\ChangeLogUpdate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(int $id, ChangeLogUpdate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $result = $changeLogsService->update($id, $request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.update_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.update_failed');
        }

        return redirect()->route('admin.interactions.logs.view', ['change_log_id' => $id])->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $result = $changeLogsService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.interactions.logs.index')->with($messageKey, $flashMessage);
    }
}
