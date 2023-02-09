<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function lookupEventMembers(string $id)
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        $event = $eventsService->findOne($id);

        return view('front.events.lookup.event-members', [
            'event' => $event,
        ]);
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function lookupBonusCards(string $id)
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');

        $event = $eventsService->findOne($id);

        return view('front.events.lookup.bonus-cards', [
            'event' => $event,
        ]);
    }
}
