<?php
namespace App\Interfaces;

use App\Http\Requests\VirtualLiveMembers\VirtualLiveMemberCreate;
use App\Models\VirtualLiveMember;

interface VirtualLiveMembersRepositoryInterface
{
    /**
     * @param array $conditions
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $conditions = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\VirtualLiveMember|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\VirtualLiveMembers\VirtualLiveMemberCreate $request
     * @return \App\Models\VirtualLiveMember|bool
     */
    public function create(VirtualLiveMemberCreate $request);

    /**
     * @param \App\Models\VirtualLiveMember $entity
     * @return bool
     */
    public function delete(VirtualLiveMember $entity): bool;
}
