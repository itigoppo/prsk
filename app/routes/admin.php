<?php

use App\Http\Controllers\Admin\ProfileController;
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
});
