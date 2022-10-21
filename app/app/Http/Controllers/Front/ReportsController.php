<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function index()
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');
        /** @var \App\Services\ReportsService $reportsService */
        $reportsService = app()->make('ReportsService');

        $units = $unitsService->findAll([
            'is_active' => true,
        ]);

        $members = $membersService->findAll([
            'is_active' => true,
        ]);
        $members = $members->where('unit.is_active', '=', true);

        $card = $cardsService->findAll()->first();

        $eventMembers = $reportsService->eventAggregationByMembers();
        $eventUnits = $reportsService->eventAggregationByUnits();
        $cards = $reportsService->cardAggregation();

        return view('front.reports.index', [
            'units' => $units,
            'members' => $members,
            'card' => $card,
            'eventUnits' => $eventUnits,
            'eventMembers' => $eventMembers,
            'cardMembers' => $cards,
        ]);
    }
}
