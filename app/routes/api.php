<?php

use App\Http\Controllers\Api\Front\AuthController;
use App\Http\Controllers\Api\Front\MemberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::middleware('guest')->group(function () {
  Route::post('login', [AuthController::class, 'login']);
});

Route::group(['middleware' => 'auth:api'], function () {
  Route::group(['prefix' => 'members', 'as' => 'members.'], function () {
    Route::get('/', [MemberController::class, 'index'])
      ->name('index');
  });
});
