<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'front.'], function () {
  Route::get('event-calc', function () {
    return view('front.event-calc');
  })->name('event-calc');

  Route::get('character-sort', function () {
    return view('front.character-sort');
  })->name('character-sort');
});
