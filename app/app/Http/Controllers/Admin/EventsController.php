<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Attribute;
use App\Enums\EventType;
use App\Enums\TuneType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Events\EventCreate;
use App\Http\Requests\Events\EventUpdate;

class EventsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');
        $events = $eventsService->findPaginate();

        return view('admin.events.index', [
            'events' => $events,
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

        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $tunes = $tunesService->findAll([
            'tp' => TuneType::NEWLY_WRITTEN,
            'u' => 'exist',
        ]);

        $cards = $cardsService->findAll();
        $units = $unitsService->findAll([
            'is_active' => true,
        ]);
        $members = $membersService->findAll();

        return view('admin.events.create', [
            'eventTypes' => EventType::asSelectArray(),
            'attributes' => Attribute::asSelectArray(),
            'tunes' => $tunes,
            'cards' => $cards,
            'units' => $units,
            'members' => $members,
        ]);
    }

    /**
     * @param \App\Http\Requests\events\EventCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(EventCreate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        $result = $eventsService->create($request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.events.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $id)
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        $event = $eventsService->findOne($id);

        return view('admin.events.view', [
            'event' => $event,
            'breadcrumbs' => [
                'event' => $event,
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
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        /** @var \App\Services\TunesService $tunesService */
        $tunesService = app()->make('TunesService');

        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $event = $eventsService->findOne($id);
        $units = $unitsService->findAll([
            'is_active' => true,
        ]);
        $members = $membersService->findAll();

        $tunes = $tunesService->findAll([
            'tp' => TuneType::NEWLY_WRITTEN,
            'u' => 'exist',
        ]);

        $cards = $cardsService->findAll();

        return view('admin.events.update', [
            'event' => $event,
            'eventTypes' => EventType::asSelectArray(),
            'attributes' => Attribute::asSelectArray(),
            'tunes' => $tunes,
            'cards' => $cards,
            'units' => $units,
            'members' => $members,
            'breadcrumbs' => [
                'event' => $event,
            ],
        ]);
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\events\EventUpdate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(int $id, EventUpdate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        $result = $eventsService->update($id, $request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.update_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.update_failed');
        }

        return redirect()->route('admin.events.view', ['event_id' => $id])->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        $result = $eventsService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.events.index')->with($messageKey, $flashMessage);
    }
}
