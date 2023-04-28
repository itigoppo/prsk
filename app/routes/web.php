<?php

use App\Http\Controllers\Admin\CardsController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\IconsController;
use App\Http\Controllers\Admin\ChangeLogsController;
use App\Http\Controllers\Admin\InteractionsController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Admin\TunesController;
use App\Http\Controllers\Admin\UnitsController;
use App\Http\Controllers\Admin\VirtualLivesController;
use App\Http\Controllers\Front\EventsController as FrontEventsController;
use App\Http\Controllers\Front\InteractionsController as FrontInteractionsController;
use App\Http\Controllers\Front\ReportsController;
use App\Http\Controllers\MediasController;
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

            Route::get('lookup', [IconsController::class, 'lookup'])
                ->name('lookup');

            Route::group(['prefix' => '{icon_id}', 'where' => ['icon_id' => '[0-9]+']], function () {
                Route::get('display', [IconsController::class, 'display'])
                    ->name('display');

                Route::post('delete', [IconsController::class, 'delete'])
                    ->name('delete');
            });
        });

        //　掛け合い管理
        Route::group(['prefix' => 'interactions', 'as' => 'interactions.'], function () {
            Route::get('/', [InteractionsController::class, 'index'])
                ->name('index');

            Route::get('create', [InteractionsController::class, 'showCreateForm'])
                ->name('create');

            Route::post('create', [InteractionsController::class, 'create']);

            Route::group([
                'prefix' => '{interaction_id}',
                'where' => ['interaction_id' => '[0-9]+'],
            ], function () {
                Route::get('/', [InteractionsController::class, 'view'])
                    ->name('view');

                Route::get('edit', [InteractionsController::class, 'showUpdateForm'])
                    ->name('update');

                Route::post('edit', [InteractionsController::class, 'update'])
                    ->name('update');

                Route::post('delete', [InteractionsController::class, 'delete'])
                    ->name('delete');

                Route::get('display', [InteractionsController::class, 'display'])
                    ->name('display');
            });

            // 掛け合い更新管理
            Route::group(['prefix' => 'logs', 'as' => 'logs.'], function () {
                Route::get('/', [ChangeLogsController::class, 'index'])
                    ->name('index');

                Route::get('create', [ChangeLogsController::class, 'showCreateForm'])
                    ->name('create');

                Route::post('create', [ChangeLogsController::class, 'create']);

                Route::group([
                    'prefix' => '{change_log_id}',
                    'where' => ['change_log_id' => '[0-9]+'],
                ], function () {
                    Route::get('/', [ChangeLogsController::class, 'view'])
                        ->name('view');

                    Route::get('edit', [ChangeLogsController::class, 'showUpdateForm'])
                        ->name('update');

                    Route::post('edit', [ChangeLogsController::class, 'update'])
                        ->name('update');

                    Route::post('delete', [ChangeLogsController::class, 'delete'])
                        ->name('delete');
                });
            });

        });

        //　楽曲管理
        Route::group(['prefix' => 'tunes', 'as' => 'tunes.'], function () {
            Route::get('/', [TunesController::class, 'index'])
                ->name('index');

            Route::get('create', [TunesController::class, 'showCreateForm'])
                ->name('create');

            Route::post('create', [TunesController::class, 'create']);

            Route::group([
                'prefix' => '{tune_id}',
                'where' => ['tune_id' => '[0-9]+'],
            ], function () {
                Route::get('/', [TunesController::class, 'view'])
                    ->name('view');

                Route::get('edit', [TunesController::class, 'showUpdateForm'])
                    ->name('update');

                Route::post('edit', [TunesController::class, 'update'])
                    ->name('update');

                Route::post('delete', [TunesController::class, 'delete'])
                    ->name('delete');
            });

            // 楽曲更新管理
            Route::group(['prefix' => 'logs', 'as' => 'logs.'], function () {
                Route::get('/', [ChangeLogsController::class, 'index'])
                    ->name('index');

                Route::get('create', [ChangeLogsController::class, 'showCreateForm'])
                    ->name('create');

                Route::post('create', [ChangeLogsController::class, 'create']);

                Route::group([
                    'prefix' => '{change_log_id}',
                    'where' => ['change_log_id' => '[0-9]+'],
                ], function () {
                    Route::get('/', [ChangeLogsController::class, 'view'])
                        ->name('view');

                    Route::get('edit', [ChangeLogsController::class, 'showUpdateForm'])
                        ->name('update');

                    Route::post('edit', [ChangeLogsController::class, 'update'])
                        ->name('update');

                    Route::post('delete', [ChangeLogsController::class, 'delete'])
                        ->name('delete');
                });
            });
        });

        //　カード管理
        Route::group(['prefix' => 'cards', 'as' => 'cards.'], function () {
            Route::get('/', [CardsController::class, 'index'])
                ->name('index');

            Route::get('create', [CardsController::class, 'showCreateForm'])
                ->name('create');

            Route::post('create', [CardsController::class, 'create']);

            Route::get('bulk', [CardsController::class, 'showBulkInsert'])
                ->name('bulk');

            Route::post('bulk', [CardsController::class, 'bulkInsert']);

            Route::group([
                'prefix' => '{card_id}',
                'where' => ['card_id' => '[0-9]+'],
            ], function () {
                Route::get('/', [CardsController::class, 'view'])
                    ->name('view');

                Route::get('edit', [CardsController::class, 'showUpdateForm'])
                    ->name('update');

                Route::post('edit', [CardsController::class, 'update'])
                    ->name('update');

                Route::post('delete', [CardsController::class, 'delete'])
                    ->name('delete');

                Route::get('display', [CardsController::class, 'display'])
                    ->name('display');
            });
        });

        //　イベント管理
        Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
            Route::get('/', [EventsController::class, 'index'])
                ->name('index');

            Route::get('create', [EventsController::class, 'showCreateForm'])
                ->name('create');

            Route::post('create', [EventsController::class, 'create']);

            Route::group([
                'prefix' => '{event_id}',
                'where' => ['event_id' => '[0-9]+'],
            ], function () {
                Route::get('/', [EventsController::class, 'view'])
                    ->name('view');

                Route::get('edit', [EventsController::class, 'showUpdateForm'])
                    ->name('update');

                Route::post('edit', [EventsController::class, 'update'])
                    ->name('update');

                Route::post('delete', [EventsController::class, 'delete'])
                    ->name('delete');
            });
        });

        Route::group(['prefix' => 'lives', 'as' => 'lives.'], function () {
            //　バーチャルライブ管理
            Route::group(['prefix' => 'virtual', 'as' => 'virtual.'], function () {
                Route::get('/', [VirtualLivesController::class, 'index'])
                    ->name('index');

                Route::get('create', [VirtualLivesController::class, 'showCreateForm'])
                    ->name('create');

                Route::post('create', [VirtualLivesController::class, 'create']);

                Route::group([
                    'prefix' => '{virtual_live_id}',
                    'where' => ['virtual_live_id' => '[0-9]+'],
                ], function () {
                    Route::get('/', [VirtualLivesController::class, 'view'])
                        ->name('view');

                    Route::get('edit', [VirtualLivesController::class, 'showUpdateForm'])
                        ->name('update');

                    Route::post('edit', [VirtualLivesController::class, 'update'])
                        ->name('update');

                    Route::post('delete', [VirtualLivesController::class, 'delete'])
                        ->name('delete');
                });
            });
        });
    });
});

Route::group(['middleware' => 'protect.media', 'prefix' => 'medias', 'as' => 'medias.'], function () {
    Route::get('icons/{icon_id}', [MediasController::class, 'icon'])
        ->name('icons')
        ->whereUuid('icon_id');

    Route::get('interactions/{interaction_id}', [MediasController::class, 'interaction'])
        ->name('interactions')
        ->whereUuid('interaction_id');

    Route::get('cards/{mode}/{card_id}', [MediasController::class, 'card'])
        ->name('cards')
        ->whereAlpha('mode')
        ->whereUuid('card_id');
});

Route::group(['as' => 'front.'], function () {
    Route::get('event-calc', function () {
        return view('front.event-calc');
    })->name('event-calc');

    Route::get('character-sort', function () {
        return view('front.character-sort');
    })->name('character-sort');

    Route::group(['prefix' => 'interactions', 'as' => 'interactions.'], function () {
        Route::get('/', [FrontInteractionsController::class, 'index'])
            ->name('index');

        Route::group([
            'prefix' => '{interaction_id}',
            'where' => ['interaction_id' => '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}'],
        ], function () {
            Route::get('view', [FrontInteractionsController::class, 'view'])
                ->name('view');

            Route::get('lookup', [FrontInteractionsController::class, 'lookup'])
                ->name('lookup');
        });
    });

    Route::group(['prefix' => 'reports', 'as' => 'reports.'], function () {
        Route::get('/', [ReportsController::class, 'index'])
            ->name('index');

        Route::get('/event-count', [ReportsController::class, 'eventCount'])
            ->name('event-count');

        Route::get('/event-cycles', [ReportsController::class, 'eventCycles'])
            ->name('event-cycles');

        Route::get('/event-attributes', [ReportsController::class, 'eventAttributes'])
            ->name('event-attributes');

        Route::get('/event-tunes', [ReportsController::class, 'eventTunes'])
            ->name('event-tunes');

        Route::get('/event-stamps', [ReportsController::class, 'eventStamps'])
            ->name('event-stamps');

        Route::get('/event-histories', [ReportsController::class, 'eventHistories'])
            ->name('event-histories');

        Route::get('/card-count', [ReportsController::class, 'cardCount'])
            ->name('card-count');

        Route::get('/card-released', [ReportsController::class, 'cardReleased'])
            ->name('card-released');

        Route::get('/card-attributes', [ReportsController::class, 'cardAttributes'])
            ->name('card-attributes');

        Route::get('/card-skills', [ReportsController::class, 'cardSkills'])
            ->name('card-skills');
    });

    Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
        Route::group([
            'prefix' => '{event_id}',
            'where' => ['event_id' => '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}'],
        ], function () {
            Route::get('event-members', [FrontEventsController::class, 'lookupEventMembers'])
                ->name('event-members');
            Route::get('bonus-cards', [FrontEventsController::class, 'lookupBonusCards'])
                ->name('bonus-cards');
        });
    });
});
