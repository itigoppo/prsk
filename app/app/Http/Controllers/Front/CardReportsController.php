<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class CardReportsController extends Controller
{
    public function cardCount()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
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
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
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
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
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
    public function cardSkills()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateCardSkillsByMember();
        $virtualSingers = $reportsService->aggregateCardSkillsByVirtualSinger();

        return view('front.reports.card-skills', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }

}
