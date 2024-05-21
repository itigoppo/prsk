<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\IconService;
use Illuminate\Http\Request;

class StorageController extends Controller
{
  public function __construct(
    private IconService $iconService
  ) {
  }

  public function showIcon(string $uuid, Request $request)
  {
    $icon = $this->iconService->findOne($uuid);

    $path = \StorageUtil::iconFilePath($icon);

    if (!\StorageUtil::exists($path)) {
      abort(404);
    }

    return \StorageUtil::download($path);
  }
}
