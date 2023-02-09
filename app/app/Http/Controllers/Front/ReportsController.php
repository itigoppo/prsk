<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index()
    {
        return view('front.reports.index', [
        ]);
    }

    public function eventCount()
    {
        /** @var \App\Services\ReportsService $reportsService */
        $reportsService = app()->make('ReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $units = $reportsService->aggregateTheNumberOfEventsByUnit();
        $members = $reportsService->aggregateTheNumberOfEventsByMember();

        return view('front.reports.event-count', [
            'card' => $card,
            'units' => $units,
            'members' => $members,
        ]);
    }

    public function eventCycles()
    {
        /** @var \App\Services\ReportsService $reportsService */
        $reportsService = app()->make('ReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $units = $reportsService->aggregateEventCyclesByUnit();

        return view('front.reports.event-cycles', [
            'card' => $card,
            'units' => $units,
        ]);
    }

    public function eventAttributes()
    {
        /** @var \App\Services\ReportsService $reportsService */
        $reportsService = app()->make('ReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $units = $reportsService->aggregateEventAttributesByUnit();
        $members = $reportsService->aggregateEventAttributesByMember();

        return view('front.reports.event-attributes', [
            'card' => $card,
            'units' => $units,
            'members' => $members,
        ]);
    }

    public function eventTunes()
    {
        /** @var \App\Services\ReportsService $reportsService */
        $reportsService = app()->make('ReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $units = $reportsService->aggregateEventTunesByUnit();
        $members = $reportsService->aggregateEventTunesByMember();

        return view('front.reports.event-tunes', [
            'card' => $card,
            'units' => $units,
            'members' => $members,
        ]);
    }

    public function eventHistories()
    {
        /** @var \App\Services\EventsService $eventsService */
        $eventsService = app()->make('EventsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $events = $eventsService->findAll();

        return view('front.reports.event-histories', [
            'card' => $card,
            'events' => $events,
        ]);
    }

    public function cardCount()
    {
        /** @var \App\Services\ReportsService $reportsService */
        $reportsService = app()->make('ReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateNumberOfCardsByMember();
        $virtualSingers = $reportsService->aggregateNumberOfCardsByVirtualSinger();

        return view('front.reports.card-count', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }

    public function cardReleased()
    {
        /** @var \App\Services\ReportsService $reportsService */
        $reportsService = app()->make('ReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateNumberOfCardsByMember();

        return view('front.reports.card-released', [
            'card' => $card,
            'members' => $members,
        ]);
    }

    public function cardAttributes()
    {
        /** @var \App\Services\ReportsService $reportsService */
        $reportsService = app()->make('ReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateCardAttributesByMember();
        $virtualSingers = $reportsService->aggregateCardAttributesByVirtualSinger();

        return view('front.reports.card-attributes', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }
}
