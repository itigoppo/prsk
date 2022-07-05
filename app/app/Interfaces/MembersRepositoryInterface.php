<?php
namespace App\Interfaces;

use App\Http\Requests\Members\MemberCreate;
use App\Http\Requests\Members\MemberUpdate;
use App\Models\Member;

interface MembersRepositoryInterface
{
    /**
     * @param array $conditions
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $conditions = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\Member|static
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Members\MemberCreate $request
     * @return bool
     */
    public function create(MemberCreate $request): bool;

    /**
     * @param \App\Models\Member $entity
     * @param \App\Http\Requests\Members\MemberUpdate $request
     * @return bool
     */
    public function update(Member $entity, MemberUpdate $request): bool;

    /**
     * @param \App\Models\Member $entity
     * @return bool
     */
    public function delete(Member $entity): bool;
}
