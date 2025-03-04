<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediasController extends Controller
{
    /**
     * @param string $uuid
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function icon(string $uuid, Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        if ((!$request->exists('token') || !$request->exists('expiration'))) {
            abort(404);
        }

        /** @var \App\Services\IconsService $iconsService */
        $iconsService = app()->make('IconsService');
        $icon = $iconsService->findOne($uuid);

        $path = $icon->path . '/' . $icon->name;

        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        return Storage::disk('local')->download($path);
    }

    /**
     * @param string $uuid
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function interaction(string $uuid, Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        if ((!$request->exists('token') || !$request->exists('expiration'))) {
            abort(404);
        }

        /** @var \App\Services\InteractionsService $interactionsService */
        $interactionsService = app()->make('InteractionsService');
        $interaction = $interactionsService->findOne($uuid);

        if (!Storage::disk('local')->exists($interaction->file)) {
            abort(404);
        }

        return Storage::disk('local')->download($interaction->file);
    }

    /**
     * @param string $mode
     * @param string $uuid
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function card(string $mode, string $uuid, Request $request): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        if ((!$request->exists('token') || !$request->exists('expiration'))) {
            abort(404);
        }

        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');
        $card = $cardsService->findOne($uuid);

        $path = '';

        if ($mode === 'normal') {
            $path = $card->normal_file;
        } elseif ($mode === 'after') {
            $path = $card->after_training_file;
        }

        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        return Storage::disk('local')->download($path);
    }
}
