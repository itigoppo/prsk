<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MemberResource;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function list(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');
        $members = $membersService->findAll([
            'is_active' => true,
        ]);

        return MemberResource::collection($members);
    }

    /**
     * @param string $id
     * @return \App\Http\Resources\MemberResource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function show(string $id): MemberResource
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');
        $member = $membersService->findOne($id);

        return new MemberResource($member);
    }
}
