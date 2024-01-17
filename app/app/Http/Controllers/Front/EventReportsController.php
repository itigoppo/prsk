<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventReportsController extends Controller
{
    public function eventCount()
    {
        /** @var \App\Services\EventReportsService $reportsService */
        $reportsService = app()->make('EventReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $units = $reportsService->aggregateTheNumberOfEventsByUnit();
        $members = $reportsService->aggregateTheNumberOfEventsByMember();

        return view('front.reports.events.count', [
            'card' => $card,
            'units' => $units,
            'members' => $members,
        ]);
    }

    public function eventCycles()
    {
        /** @var \App\Services\EventReportsService $reportsService */
        $reportsService = app()->make('EventReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $cycles = $reportsService->aggregateEventCycles();
        $units = $reportsService->aggregateEventCyclesByUnit();

        return view('front.reports.events.cycles', [
            'card' => $card,
            'cycles' => $cycles,
            'units' => $units,
        ]);
    }

    public function eventAttributes()
    {
        /** @var \App\Services\EventReportsService $reportsService */
        $reportsService = app()->make('EventReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $attributes = $reportsService->aggregateEventAttributes();
        $units = $reportsService->aggregateEventAttributesByUnit();
        $members = $reportsService->aggregateEventAttributesByMember();

        return view('front.reports.events.attributes', [
            'card' => $card,
            'attributes' => $attributes,
            'units' => $units,
            'members' => $members,
        ]);
    }

    public function eventTunes()
    {
        /** @var \App\Services\EventReportsService $reportsService */
        $reportsService = app()->make('EventReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $units = $reportsService->aggregateEventTunesByUnit();
        $members = $reportsService->aggregateEventTunesByMember();
        $virtualSingers = $reportsService->aggregateEventTunesByVirtualSinger();

        return view('front.reports.events.tunes', [
            'card' => $card,
            'units' => $units,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }

    public function eventStamps()
    {
        /** @var \App\Services\EventReportsService $reportsService */
        $reportsService = app()->make('EventReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateEventStampsByMember();

        return view('front.reports.events.stamps', [
            'card' => $card,
            'members' => $members,
        ]);
    }

    public function eventHistories(Request $request)
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $events = $eventsService->findPaginate($request->query(), [])->withQueryString();

        return view('front.reports.events.histories', [
            'card' => $card,
            'events' => $events,
            'search' => $request->query(),
        ]);
    }
}
