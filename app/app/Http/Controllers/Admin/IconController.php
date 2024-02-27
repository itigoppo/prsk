<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Icon\SearchRequest;
use App\Models\Icon;
use App\Services\IconService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class IconController extends Controller
{
  public function __construct(private IconService $iconService)
  {
    $this->iconService = $iconService;
  }

  public function index(SearchRequest $request): View
  {
    $icons = $this->iconService->findPaginate($request);

    return view('admin.icons.index', [
      'icons' => $icons,
      'filter' => $request->collect('filter'),
    ]);
  }

  public function search(Request $request): RedirectResponse
  {
    $filter = array_filter(
      $request->collect('filter')->toArray(),
      function ($value) {
        return !(is_null($value) || $value === "");
      }
    );

    return redirect()->route('admin.icons.index', $filter ? ['filter' => $filter] : []);
  }

  public function store(Request $request): JsonResponse
  {
    $result  = $this->iconService->store($request);

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

  public function lookup(SearchRequest $request): View
  {
    $icons = $this->iconService->findPaginate($request);

    return view('admin.icons.lookup', [
      'icons' => $icons,
    ]);
  }

  public function display(int $id): StreamedResponse
  {
    $icon = $this->iconService->findOne($id);
    $path = Icon::filePath($icon);

    return Storage::disk('local')->download($path);
  }

  public function destroy(int $id,): RedirectResponse
  {
    $result = $this->iconService->destroy($id);

    if ($result) {
      $messageKey = 'success';
      $flashMessage = __('crud.destroy.success');
    } else {
      $messageKey = 'error';
      $flashMessage = __('crud.destroy.failed');
    }

    return redirect()->route('admin.icons.index')->with($messageKey, $flashMessage);
  }
}
