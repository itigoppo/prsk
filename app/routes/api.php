<?php

use App\Http\Controllers\Api\AjaxController;
use App\Http\Controllers\Api\MembersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('setting', [AjaxController::class, 'getSetting']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::group(['prefix' => 'members', 'as' => 'members.'], function () {
        Route::get('/', [MembersController::class, 'list'])
            ->name('index');

        Route::get('{member_id}', [MembersController::class, 'show'])
            ->name('view')
            ->where('member_id', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
    });
});

