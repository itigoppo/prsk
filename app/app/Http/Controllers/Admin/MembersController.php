<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\members\MemberCreate;
use App\Http\Requests\members\MemberUpdate;
use App\Models\Member;

class MembersController extends Controller
{
    /**
     * @param int|null $unitId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(int $unitId = null)
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');

        $render = [];
        $search = [];
        if (!empty($unitId)) {
            $search = [
                ['unit_id', '=', (string) $unitId],
            ];

            $unit = $unitsService->findOne($unitId);

            $render = [
                'unit_id' => $unitId,
                'breadcrumbs' => [
                    'unit' => $unit,
                ],
            ];
        }

        $members = $membersService->findAll($search);

        return view('admin.members.index', [
            'members' => $members,
        ] + $render);
    }

    /**
     * @param int|null $unitId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showCreateForm(int $unitId = null)
    {
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');
        /** @var \App\Services\IconsService $iconsService */
        $iconsService = app()->make('IconsService');

        $units = $unitsService->findAll();
        $icons = $iconsService->findAll([], ['label' => 'asc']);

        $render = [];
        if (!empty($unitId)) {
            $member = new Member();
            $member->unit_id = $unitId;

            $unit = $unitsService->findOne($unitId);

            $render = [
                'member' => $member,
                'breadcrumbs' => [
                    'unit' => $unit,
                ],
            ];
        }

        return view('admin.members.create', [
            'units' => $units,
            'icons' => $icons,
        ] + $render);
    }

    /**
     * @param \App\Http\Requests\members\MemberCreate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(MemberCreate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $result = $membersService->create($request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.create_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.create_failed');
        }

        return redirect()->route('admin.units.members.index', ['unit_id' => $request->unit_id])
            ->with($messageKey, $flashMessage);
    }

    /**
     * @param int $unitId
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function view(int $unitId, int $id)
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $member = $membersService->findOne($id);

        return view('admin.members.view', [
            'member' => $member,
            'breadcrumbs' => [
                'member' => $member,
            ],
        ]);
    }

    /**
     * @param int $unitId
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function showUpdateForm(int $unitId, int $id)
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');
        /** @var \App\Services\UnitsService $unitsService */
        $unitsService = app()->make('UnitsService');
        /** @var \App\Services\IconsService $iconsService */
        $iconsService = app()->make('IconsService');

        $member = $membersService->findOne($id);
        $units = $unitsService->findAll();
        $icons = $iconsService->findAll([], ['label' => 'asc']);

        return view('admin.members.update', [
            'member' => $member,
            'units' => $units,
            'icons' => $icons,
            'breadcrumbs' => [
                'member' => $member,
            ],
        ]);
    }

    /**
     * @param int $unitId
     * @param int $id
     * @param \App\Http\Requests\members\MemberUpdate $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function update(int $unitId, int $id, MemberUpdate $request): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $result = $membersService->update($id, $request);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.update_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.update_failed');
        }

        return redirect()->route('admin.units.members.view', ['member_id' => $id, 'unit_id' => $unitId])
            ->with($messageKey, $flashMessage);
    }

    /**
     * @param int $unitId
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function delete(int $unitId, int $id): \Illuminate\Http\RedirectResponse
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $result = $membersService->delete($id);

        if ($result) {
            $messageKey = 'success';
            $flashMessage = __('crud.delete_success');
        } else {
            $messageKey = 'error';
            $flashMessage = __('crud.delete_failed');
        }

        return redirect()->route('admin.members.index')->with($messageKey, $flashMessage);
    }
}
