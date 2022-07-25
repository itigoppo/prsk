<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ChangeLogType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeLogs\ChangeLogCreate;
use App\Http\Requests\ChangeLogs\ChangeLogUpdate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class ChangeLogsController extends Controller
{
    /**
     * @return ChangeLogType|\BenSampo\Enum\Enum
     */
    private function getType()
    {
        $route = Route::currentRouteName();
        $type = Str::between($route, 'admin.', '.logs');

        return ChangeLogType::fromValue(Str::singular($type));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        $changeLogType = $this->getType();

        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $request = [
            'tp' => $changeLogType->value,
        ];
        $changeLogs = $changeLogsService->findPaginate($request, []);

        return view('admin.change-logs.index', [
            'changeLogs' => $changeLogs,
            'changeLogType' => $changeLogType,
            'route' => 'admin.' . Str::plural($changeLogType->value) . '.logs.',
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showCreateForm()
    {
        $changeLogType = $this->getType();

        return view('admin.change-logs.create', [
            'changeLogType' => $changeLogType,
            'actionRoute' => 'admin.' . Str::plural($changeLogType->value) . '.logs.create',
        ]);
    }

    /**
     * @param \App\Http\Requests\changeLogs\ChangeLogCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(ChangeLogCreate $request): \Illuminate\Http\RedirectResponse
    {
        $changeLogType = $this->getType();

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

        return redirect()->route('admin.' . Str::plural($changeLogType->value) . '.logs.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $id)
    {
        $changeLogType = $this->getType();

        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $changeLog = $changeLogsService->findOne($id);

        return view('admin.change-logs.view', [
            'changeLog' => $changeLog,
            'changeLogType' => $changeLogType,
            'route' => 'admin.' . Str::plural($changeLogType->value) . '.logs.',
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
        $changeLogType = $this->getType();

        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $changeLog = $changeLogsService->findOne($id);

        return view('admin.change-logs.update', [
            'changeLog' => $changeLog,
            'changeLogType' => $changeLogType,
            'actionRoute' => 'admin.' . Str::plural($changeLogType->value) . '.logs.update',
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
        $changeLogType = $this->getType();

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

        return redirect()->route('admin.' . Str::plural($changeLogType->value) . '.logs.view', ['change_log_id' => $id])->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        $changeLogType = $this->getType();

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

        return redirect()->route('admin.' . Str::plural($changeLogType->value) . '.logs.index')->with($messageKey, $flashMessage);
    }
}
