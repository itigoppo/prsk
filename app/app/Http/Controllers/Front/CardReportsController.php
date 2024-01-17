<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class CardReportsController extends Controller
{
    public function count()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateNumberOfCardsByMember();
        $virtualSingers = $reportsService->aggregateNumberOfCardsByVirtualSinger();

        return view('front.reports.cards.count', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }

    public function released()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateNumberOfCardsByMember();

        return view('front.reports.cards.released', [
            'card' => $card,
            'members' => $members,
        ]);
    }

    public function attributes()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateCardAttributesByMember();
        $virtualSingers = $reportsService->aggregateCardAttributesByVirtualSinger();

        return view('front.reports.cards.attributes', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }

    public function skills()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateCardSkillsByMember();
        $virtualSingers = $reportsService->aggregateCardSkillsByVirtualSinger();

        return view('front.reports.cards.skills', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }
}
