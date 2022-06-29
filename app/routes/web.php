<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IconsController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\UnitsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::group(['middleware' => 'can:isAdmin'], function () {
        // ユニット管理
        Route::group(['prefix' => 'units', 'as' => 'units.'], function () {
            Route::get('/', [UnitsController::class, 'index'])
                ->name('index');

            Route::get('create', [UnitsController::class, 'showCreateForm'])
                ->name('create');

            Route::post('create', [UnitsController::class, 'create']);

            Route::group([
                'prefix' => '{unit_id}',
                'where' => ['unit_id' => '[0-9]+'],
            ], function () {
                Route::get('/', [UnitsController::class, 'view'])
                    ->name('view');

                Route::get('edit', [UnitsController::class, 'showUpdateForm'])
                    ->name('update');

                Route::post('edit', [UnitsController::class, 'update'])
                    ->name('update');

                Route::post('delete', [UnitsController::class, 'delete'])
                    ->name('delete');

                // メンバー管理
                Route::group(['prefix' => 'members', 'as' => 'members.'], function () {
                    Route::get('/', [MembersController::class, 'index'])
                        ->name('index');

                    Route::get('create', [MembersController::class, 'showCreateForm'])
                        ->name('create');

                    Route::group(['prefix' => '{member_id}', 'where' => ['member_id' => '[0-9]+']], function () {
                        Route::get('/', [MembersController::class, 'view'])
                            ->name('view');

                        Route::get('edit', [MembersController::class, 'showUpdateForm'])
                            ->name('update');

                        Route::post('edit', [MembersController::class, 'update'])
                            ->name('update');

                        Route::post('delete', [MembersController::class, 'delete'])
                            ->name('delete');
                    });
                });
            });
        });

        //　メンバー管理
        Route::group(['prefix' => 'members', 'as' => 'members.'], function () {
            Route::get('/', [MembersController::class, 'index'])
                ->name('index');

            Route::get('create', [MembersController::class, 'showCreateForm'])
                ->name('create');

            Route::post('create', [MembersController::class, 'create']);

        });

        // アイコン管理
        Route::group(['prefix' => 'icons', 'as' => 'icons.'], function () {
            Route::get('/', [IconsController::class, 'index'])
                ->name('index');

            Route::post('upload', [IconsController::class, 'upload'])
                ->name('upload');

            Route::get('show', [IconsController::class, 'show'])
                ->name('show');

            Route::group(['prefix' => '{icon_id}', 'where' => ['icon_id' => '[0-9]+']], function () {
                Route::get('display', [IconsController::class, 'display'])
                    ->name('display');

                Route::post('delete', [IconsController::class, 'delete'])
                    ->name('delete');
            });
        });
    });
});

