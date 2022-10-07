<?php

namespace App\Repositories;

use App\Http\Requests\VirtualLiveMembers\VirtualLiveMemberCreate;
use App\Interfaces\VirtualLiveMembersRepositoryInterface;
use App\Models\VirtualLiveMember;
use App\Traits\QueryBuilderTrait;

class VirtualLiveMembersRepository implements VirtualLiveMembersRepositoryInterface
{
    use QueryBuilderTrait;

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = VirtualLiveMember::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'id' => 'asc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->get();
    }

    public function findOne($id)
    {
        return VirtualLiveMember::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(VirtualLiveMemberCreate $request)
    {
        $entity = new VirtualLiveMember();
        $entity->virtual_live_id = $request->virtual_live_id;
        $entity->member_id = $request->member_id;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(VirtualLiveMember $entity): bool
    {
        return $entity->delete();
    }
}
