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
