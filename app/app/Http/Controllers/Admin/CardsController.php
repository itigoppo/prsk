<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Attribute;
use App\Enums\Rarity;
use App\Enums\SkillEffect;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cards\CardCreate;
use App\Http\Requests\Cards\CardUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CardsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');
        $cards = $cardsService->findPaginate();

        return view('admin.cards.index', [
            'cards' => $cards,
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
        $members = $membersService->findAll([
            'is_active' => true,
        ]);
        $members = $members->where('unit.is_active', '=', true);

        return view('admin.cards.create', [
            'rarities' => Rarity::asSelectArray(),
            'attributes' => Attribute::asSelectArray(),
            'members' => $members,
            'skillEffects' => SkillEffect::asSelectArray(),
        ]);
    }

    /**
     * @param \App\Http\Requests\cards\CardCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(CardCreate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $result = $cardsService->create($request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.cards.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $id)
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findOne($id);

        return view('admin.cards.view', [
            'card' => $card,
            'breadcrumbs' => [
                'card' => $card,
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
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $card = $cardsService->findOne($id);
        $members = $membersService->findAll([
            'is_active' => true,
        ]);
        $members = $members->where('unit.is_active', '=', true);

        return view('admin.cards.update', [
            'card' => $card,
            'rarities' => Rarity::asSelectArray(),
            'attributes' => Attribute::asSelectArray(),
            'members' => $members,
            'skillEffects' => SkillEffect::asSelectArray(),
            'breadcrumbs' => [
                'card' => $card,
            ],
        ]);
    }

    /**
     * @param int $id
     * @param \App\Http\Requests\cards\CardUpdate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(int $id, CardUpdate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $result = $cardsService->update($id, $request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.update_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.update_failed');
        }

        return redirect()->route('admin.cards.view', ['card_id' => $id])->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $result = $cardsService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.cards.index')->with($messageKey, $flashMessage);
    }

    /**
     * @param int $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function display(int $id, Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');
        $card = $cardsService->findOne($id);

        $path = '';

        if ($request->query('mode') === 'normal') {
            $path = $card->normal_file;
        }elseif ($request->query('mode') === 'after_training') {
            $path = $card->after_training_file;
        }

        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        return Storage::disk('local')->download($path);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showBulkInsert()
    {
        return view('admin.cards.bulk', [
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function bulkInsert(Request $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $validator = Validator::make($request->toArray(), ['import_csv' => 'required|mimes:csv,txt']);

        if ($validator->fails()) {
            $result = false;
        } else {
            $result = $cardsService->bulk($request);
        }

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.cards.index')->with($messageKey, $flashMessage);
    }
}
