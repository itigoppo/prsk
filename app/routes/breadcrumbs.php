<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use App\Models\Unit;
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('/'));
});

Breadcrumbs::for('admin.home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('admin.home'));
});

Breadcrumbs::for('admin.units.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('ユニット管理', route('admin.units.index'));
});

Breadcrumbs::for('admin.units.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('ユニット管理', route('admin.units.index'));
    $trail->push('ユニット作成', route('admin.units.create'));
});

Breadcrumbs::for('admin.units.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Unit $unit */
    $unit = $breadcrumbs['unit'];

    $trail->parent('admin.home');
    $trail->push('ユニット管理', route('admin.units.index'));
    $trail->push('ユニット詳細: ' . $unit->name, route('admin.units.view', ['unit_id' => $unit->id]));
});

Breadcrumbs::for('admin.units.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Unit $unit */
    $unit = $breadcrumbs['unit'];

    $trail->parent('admin.home');
    $trail->push('ユニット管理', route('admin.units.index'));
    $trail->push($unit->name, route('admin.units.view', ['unit_id' => $unit->id]));
    $trail->push('ユニット編集', route('admin.units.update', ['unit_id' => $unit->id]));
});

Breadcrumbs::for('admin.members.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('メンバー管理', route('admin.members.index'));
});

Breadcrumbs::for('admin.members.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('メンバー管理', route('admin.members.index'));
    $trail->push('メンバー作成', route('admin.units.create'));
});

Breadcrumbs::for('admin.units.members.index', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Unit $unit */
    $unit = $breadcrumbs['unit'];

    $trail->parent('admin.home');
    $trail->push('ユニット管理', route('admin.units.index'));
    $trail->push($unit->name, route('admin.units.view', ['unit_id' => $unit->id]));
    $trail->push('メンバー管理', route('admin.members.index'));
});

Breadcrumbs::for('admin.units.members.create', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Unit $unit */
    $unit = $breadcrumbs['unit'];

    $trail->parent('admin.home');
    $trail->push('ユニット管理', route('admin.units.index'));
    $trail->push($unit->name, route('admin.units.view', ['unit_id' => $unit->id]));
    $trail->push('メンバー管理', route('admin.members.index'));
    $trail->push('メンバー作成', route('admin.members.create'));
});

Breadcrumbs::for('admin.units.members.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Member $member */
    $member = $breadcrumbs['member'];

    $trail->parent('admin.home');
    $trail->push('ユニット管理', route('admin.units.index'));
    $trail->push($member->unit->name, route('admin.units.view', ['unit_id' => $member->unit_id]));
    $trail->push('メンバー管理', route('admin.units.members.index', ['unit_id' => $member->unit_id]));
    $trail->push(
        'メンバー詳細: ' . $member->name,
        route('admin.units.members.view', ['unit_id' => $member->unit_id, 'member_id' => $member->id])
    );
});

Breadcrumbs::for('admin.units.members.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Member $member */
    $member = $breadcrumbs['member'];

    $trail->parent('admin.home');
    $trail->push('ユニット管理', route('admin.units.index'));
    $trail->push($member->unit->name, route('admin.units.view', ['unit_id' => $member->unit_id]));
    $trail->push('メンバー管理', route('admin.units.members.index', ['unit_id' => $member->unit_id]));
    $trail->push(
        $member->name,
        route('admin.units.members.view', ['unit_id' => $member->unit_id, 'member_id' => $member->id])
    );
    $trail->push(
        'メンバー編集',
        route('admin.units.members.update', ['unit_id' => $member->unit_id, 'member_id' => $member->id])
    );
});

Breadcrumbs::for('admin.icons.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('アイコン管理', route('admin.icons.index'));
});


Breadcrumbs::for('admin.interactions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('掛け合い管理', route('admin.interactions.index'));
});

Breadcrumbs::for('admin.interactions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('掛け合い管理', route('admin.interactions.index'));
    $trail->push('掛け合い作成', route('admin.interactions.create'));
});

Breadcrumbs::for('admin.interactions.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Interaction $interaction */
    $interaction = $breadcrumbs['interaction'];

    $detail = (!empty($interaction->fromMember) ? $interaction->fromMember->display_short : 'anyone')
        . ' + '
        . (!empty($interaction->toMember) ? $interaction->toMember->display_short : 'anyone');

    $trail->parent('admin.home');
    $trail->push('掛け合い管理', route('admin.interactions.index'));
    $trail->push('掛け合い詳細: ' . $detail, route('admin.interactions.view', ['interaction_id' => $interaction->id]));
});

Breadcrumbs::for('admin.interactions.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Interaction $interaction */
    $interaction = $breadcrumbs['interaction'];
    $detail = (!empty($interaction->fromMember) ? $interaction->fromMember->display_short : 'anyone')
        . ' + '
        . (!empty($interaction->toMember) ? $interaction->toMember->display_short : 'anyone');

    $trail->parent('admin.home');
    $trail->push('掛け合い管理', route('admin.interactions.index'));
    $trail->push($detail, route('admin.interactions.view', ['interaction_id' => $interaction->id]));
    $trail->push('掛け合い編集', route('admin.interactions.update', ['interaction_id' => $interaction->id]));
});

Breadcrumbs::for('admin.interactions.logs.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('掛け合い管理', route('admin.interactions.index'));
    $trail->push('更新履歴', route('admin.interactions.logs.index'));
});

Breadcrumbs::for('admin.interactions.logs.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('掛け合い管理', route('admin.interactions.index'));
    $trail->push('更新履歴', route('admin.interactions.logs.index'));
    $trail->push('更新履歴作成', route('admin.interactions.logs.create'));
});

Breadcrumbs::for('admin.interactions.logs.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\ChangeLog $changeLog */
    $changeLog = $breadcrumbs['changeLog'];

    $trail->parent('admin.home');
    $trail->push('掛け合い管理', route('admin.interactions.index'));
    $trail->push('更新履歴', route('admin.interactions.logs.index'));
    $trail->push(
        '更新履歴詳細: ' . $changeLog->released_at->format('Y/m/d'),
        route('admin.interactions.logs.view', ['change_log_id' => $changeLog->id])
    );
});

Breadcrumbs::for('admin.interactions.logs.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\ChangeLog $changeLog */
    $changeLog = $breadcrumbs['changeLog'];

    $trail->parent('admin.home');
    $trail->push('掛け合い管理', route('admin.interactions.index'));
    $trail->push('更新履歴', route('admin.interactions.logs.index'));
    $trail->push($changeLog->released_at->format('Y/m/d'), route('admin.interactions.logs.view', ['change_log_id' => $changeLog->id]));
    $trail->push('更新履歴編集', route('admin.interactions.logs.update', ['change_log_id' => $changeLog->id]));
});

Breadcrumbs::for('admin.tunes.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('楽曲管理', route('admin.tunes.index'));
});

Breadcrumbs::for('admin.tunes.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('楽曲管理', route('admin.tunes.index'));
    $trail->push('楽曲作成', route('admin.tunes.create'));
});

Breadcrumbs::for('admin.tunes.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Tune $tune */
    $tune = $breadcrumbs['tune'];

    $trail->parent('admin.home');
    $trail->push('楽曲管理', route('admin.tunes.index'));
    $trail->push('楽曲詳細: ' . $tune->name, route('admin.tunes.view', ['tune_id' => $tune->id]));
});

Breadcrumbs::for('admin.tunes.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Tune $tune */
    $tune = $breadcrumbs['tune'];

    $trail->parent('admin.home');
    $trail->push('楽曲管理', route('admin.tunes.index'));
    $trail->push($tune->name, route('admin.tunes.view', ['tune_id' => $tune->id]));
    $trail->push('楽曲編集', route('admin.tunes.update', ['tune_id' => $tune->id]));
});

Breadcrumbs::for('admin.tunes.logs.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('楽曲管理', route('admin.tunes.index'));
    $trail->push('更新履歴', route('admin.tunes.logs.index'));
});

Breadcrumbs::for('admin.tunes.logs.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('楽曲管理', route('admin.tunes.index'));
    $trail->push('更新履歴', route('admin.tunes.logs.index'));
    $trail->push('更新履歴作成', route('admin.tunes.logs.create'));
});

Breadcrumbs::for('admin.tunes.logs.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\ChangeLog $changeLog */
    $changeLog = $breadcrumbs['changeLog'];

    $trail->parent('admin.home');
    $trail->push('楽曲管理', route('admin.tunes.index'));
    $trail->push('更新履歴', route('admin.tunes.logs.index'));
    $trail->push(
        '更新履歴詳細: ' . $changeLog->released_at->format('Y/m/d'),
        route('admin.tunes.logs.view', ['change_log_id' => $changeLog->id])
    );
});

Breadcrumbs::for('admin.tunes.logs.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\ChangeLog $changeLog */
    $changeLog = $breadcrumbs['changeLog'];

    $trail->parent('admin.home');
    $trail->push('楽曲管理', route('admin.tunes.index'));
    $trail->push('更新履歴', route('admin.tunes.logs.index'));
    $trail->push($changeLog->released_at->format('Y/m/d'), route('admin.tunes.logs.view', ['change_log_id' => $changeLog->id]));
    $trail->push('更新履歴編集', route('admin.tunes.logs.update', ['change_log_id' => $changeLog->id]));
});

Breadcrumbs::for('admin.cards.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('カード管理', route('admin.cards.index'));
});

Breadcrumbs::for('admin.cards.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('カード管理', route('admin.cards.index'));
    $trail->push('カード作成', route('admin.cards.create'));
});

Breadcrumbs::for('admin.cards.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Card $card */
    $card = $breadcrumbs['card'];

    $trail->parent('admin.home');
    $trail->push('カード管理', route('admin.cards.index'));
    $trail->push(
        'カード詳細: [' . $card->name . ']' . $card->member->display_name,
        route('admin.cards.view', ['card_id' => $card->id])
    );
});

Breadcrumbs::for('admin.cards.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Card $card */
    $card = $breadcrumbs['card'];

    $trail->parent('admin.home');
    $trail->push('カード管理', route('admin.cards.index'));
    $trail->push(
        '[' . $card->name . ']' . $card->member->display_name,
        route('admin.cards.view', ['card_id' => $card->id])
    );
    $trail->push('カード編集', route('admin.cards.update', ['card_id' => $card->id]));
});

Breadcrumbs::for('admin.events.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('イベント管理', route('admin.events.index'));
});

Breadcrumbs::for('admin.events.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('イベント管理', route('admin.events.index'));
    $trail->push('イベント作成', route('admin.events.create'));
});

Breadcrumbs::for('admin.events.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Event $event */
    $event = $breadcrumbs['event'];

    $trail->parent('admin.home');
    $trail->push('イベント管理', route('admin.events.index'));
    $trail->push(
        'イベント詳細: ' . $event->name,
        route('admin.events.view', ['event_id' => $event->id])
    );
});

Breadcrumbs::for('admin.events.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\Event $event */
    $event = $breadcrumbs['event'];

    $trail->parent('admin.home');
    $trail->push('イベント管理', route('admin.events.index'));
    $trail->push(
        $event->name,
        route('admin.events.view', ['event_id' => $event->id])
    );
    $trail->push('イベント編集', route('admin.events.update', ['event_id' => $event->id]));
});

Breadcrumbs::for('admin.lives.virtual.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('バーチャルライブ管理', route('admin.lives.virtual.index'));
});

Breadcrumbs::for('admin.lives.virtual.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('バーチャルライブ管理', route('admin.lives.virtual.index'));
    $trail->push('バーチャルライブ作成', route('admin.lives.virtual.create'));
});

Breadcrumbs::for('admin.lives.virtual.view', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\VirtualLive $virtualLive */
    $virtualLive = $breadcrumbs['virtualLive'];

    $trail->parent('admin.home');
    $trail->push('バーチャルライブ管理', route('admin.lives.virtual.index'));
    $trail->push(
        'バーチャルライブ詳細: ' . $virtualLive->name,
        route('admin.lives.virtual.view', ['virtual_live_id' => $virtualLive->id])
    );
});

Breadcrumbs::for('admin.lives.virtual.update', function (BreadcrumbTrail $trail, array $breadcrumbs) {
    /** @var \App\Models\VirtualLive $virtualLive */
    $virtualLive = $breadcrumbs['virtualLive'];

    $trail->parent('admin.home');
    $trail->push('バーチャルライブ管理', route('admin.lives.virtual.index'));
    $trail->push(
        $virtualLive->name,
        route('admin.lives.virtual.view', ['virtual_live_id' => $virtualLive->id])
    );
    $trail->push('バーチャルライブ編集', route('admin.lives.virtual.update', ['virtual_live_id' => $virtualLive->id]));
});
