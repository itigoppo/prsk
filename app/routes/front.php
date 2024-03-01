<?php

use App\Http\Controllers\Front\StorageController;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'front.'], function () {
  Route::get('event-calc', function () {
    return view('front.event-calc');
  })->name('event-calc');

  Route::get('character-sort', function () {
    return view('front.character-sort');
  })->name('character-sort');
});

Route::group(['middleware' => 'expiration', 'prefix' => 'media', 'as' => 'media.'], function () {
  Route::get('icons/{id}', [StorageController::class, 'showIcon'])
    ->name('icons')
    ->where('id', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
});
