<?php

namespace App\Http\Controllers\Front;

use App\Enums\ChangeLogType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        /** @var \App\Services\ChangeLogsService $changeLogsService */
        $changeLogsService = app()->make('ChangeLogsService');

        $interactions = $interactionsService->findPaginate($request->query(), [])->withQueryString();
        $units = $unitsService->findAll();
        $logRequest = [
            'tp' => ChangeLogType::INTERACTION,
        ];
        $changeLogs = $changeLogsService->findAll($logRequest, []);

        return view('front.interactions.index', [
            'interactions' => $interactions,
            'units' => $units,
            'search' => $request->query(),
            'changeLogs' => $changeLogs,
        ]);
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(string $id)
    {
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');

        $interaction = $interactionsService->findOne($id);

        return view('front.interactions.view', [
            'interaction' => $interaction,
        ]);
    }

    /**
     * @param string $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function lookup(string $id)
    {
        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');

        $interaction = $interactionsService->findOne($id);

        return view('front.interactions.lookup', [
            'interaction' => $interaction,
        ]);
    }
}
