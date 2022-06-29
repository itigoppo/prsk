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
