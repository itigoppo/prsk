<?php
namespace App\Interfaces;

use App\Http\Requests\EventMembers\EventMemberCreate;
use App\Models\EventMember;

interface EventMembersRepositoryInterface
{
    /**
     * @param array $conditions
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $conditions = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\EventMember|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\EventMembers\EventMemberCreate $request
     * @return \App\Models\EventMember|bool
     */
    public function create(EventMemberCreate $request);

    /**
     * @param \App\Models\EventMember $entity
     * @return bool
     */
    public function delete(EventMember $entity): bool;
}
