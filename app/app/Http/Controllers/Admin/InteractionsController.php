<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Interactions\InteractionCreate;
use App\Http\Requests\Interactions\InteractionUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InteractionsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(Request $request)
    {
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        $interactions = $interactionsService->findPaginate($request->query(), [], 50);
        $units = $unitsService->findAll();

        return view('admin.interactions.index', [
            'interactions' => $interactions,
            'units' => $units,
            'search' => $request->query(),
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showCreateForm()
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');
        $members = $membersService->findAll();

        return view('admin.interactions.create', [
            'members' => $members,
        ]);
    }

    /**
     * @param \App\Http\Requests\interactions\InteractionCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(InteractionCreate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');

        $result = $interactionsService->create($request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.interactions.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $id)
    {
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');

        $interaction = $interactionsService->findOne($id);

        return view('admin.interactions.view', [
            'interaction' => $interaction,
            'breadcrumbs' => [
                'interaction' => $interaction,
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
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $interaction = $interactionsService->findOne($id);
        $members = $membersService->findAll();

        return view('admin.interactions.update', [
            'interaction' => $interaction,
            'members' => $members,
            'breadcrumbs' => [
                'interaction' => $interaction,
            ],
        ]);
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\interactions\InteractionUpdate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(int $id, InteractionUpdate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');

        $result = $interactionsService->update($id, $request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.update_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.update_failed');
        }

        return redirect()->route('admin.interactions.view', ['interaction_id' => $id])->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');

        $result = $interactionsService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.interactions.index')->with($messageKey, $flashMessage);
    }


    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function display(int $id): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');
        $interaction = $interactionsService->findOne($id);

        if (!Storage::disk('local')->exists($interaction->file)) {
            abort(404);
        }

        return Storage::disk('local')->download($interaction->file);
    }
}
