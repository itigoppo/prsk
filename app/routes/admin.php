<?php

use App\Http\Controllers\Admin\IconController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UnitController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'verified', 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::get('dashboard', function () {
    return view('admin.dashboard');
  })->name('dashboard');

  Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
    Route::get('/', [ProfileController::class, 'edit'])
      ->name('edit');

    Route::patch('/', [ProfileController::class, 'update'])
      ->name('update');

    Route::delete('/', [ProfileController::class, 'destroy'])
      ->name('destroy');
  });

  Route::group(['prefix' => 'units', 'as' => 'units.'], function () {
    Route::get('/', [UnitController::class, 'index'])
      ->name('index');

    Route::post('/', [UnitController::class, 'search'])
      ->name('search');

    Route::get('create', [UnitController::class, 'create'])
      ->name('create')
      ->middleware('can:isAdmin');

    Route::post('create', [UnitController::class, 'store'])
      ->name('store')
      ->middleware('can:isAdmin');

    Route::group([
      'prefix' => '{id}',
      'where' => ['id' => '[0-9]+'],
    ], function () {
      Route::get('/', [UnitController::class, 'view'])
        ->name('view');

      Route::get('edit', [UnitController::class, 'edit'])
        ->name('edit')
        ->middleware('can:isAdmin');

      Route::patch('/', [UnitController::class, 'update'])
        ->name('update')
        ->middleware('can:isAdmin');

      Route::delete('/', [UnitController::class, 'destroy'])
        ->name('destroy')
        ->middleware('can:isAdmin');
    });
  });


  // アイコン管理
  Route::group(['prefix' => 'icons', 'as' => 'icons.'], function () {
    Route::get('/', [IconController::class, 'index'])
      ->name('index');

    Route::post('store', [IconController::class, 'store'])
      ->name('store')->middleware('can:isAdmin');

    Route::get('lookup', [IconController::class, 'lookup'])
      ->name('lookup');

    Route::group(['prefix' => '{id}', 'where' => ['id' => '[0-9]+']], function () {
      Route::get('display', [IconController::class, 'display'])
        ->name('display');

      Route::delete('/', [IconController::class, 'destroy'])
        ->name('destroy')
        ->middleware('can:isAdmin');
    });
  });
});
