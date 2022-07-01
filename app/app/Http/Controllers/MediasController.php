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
}
