<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IconsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        /** @var \App\Services\IconsService $iconsService */
        $iconsService = app()->make('IconsService');
        $icons = $iconsService->findPaginate([], ['id' => 'desc']);

        return view('admin.icons.index', [
            'icons' => $icons,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function lookup()
    {
        /** @var \App\Services\IconsService $iconsService */
        $iconsService = app()->make('IconsService');
        $icons = $iconsService->findPaginate([], ['id' => 'desc'])->withPath(route('admin.icons.index'));

        return view('admin.icons.lookup', [
            'icons' => $icons,
        ]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function upload(Request $request): \Illuminate\Http\JsonResponse
    {
        /** @var \App\Services\IconsService $iconsService */
        $iconsService = app()->make('IconsService');
        $result = $iconsService->create($request);

        if ($result) {
            return response()->json([
                'message' => 'success',
            ]);
        } else {
            return response()->json([
                'message' => 'icon upload error',
            ], 500);
        }
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function display(int $id): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        /** @var \App\Services\IconsService $iconsService */
        $iconsService = app()->make('IconsService');
        $icon = $iconsService->findOne($id);
        $path = $icon->path . '/' . $icon->name;

        if (!Storage::disk('local')->exists($path)) {
            abort(404);
        }

        return Storage::disk('local')->download($path);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\IconsService $iconsService */
        $iconsService = app()->make('IconsService');

        $result = $iconsService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.icons.index')->with($messageKey, $flashMessage);
    }
}
