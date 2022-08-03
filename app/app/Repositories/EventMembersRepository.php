<?php

namespace App\Repositories;

use App\Http\Requests\EventMembers\EventMemberCreate;
use App\Interfaces\EventMembersRepositoryInterface;
use App\Models\EventMember;
use App\Traits\QueryBuilderTrait;

class EventMembersRepository implements EventMembersRepositoryInterface
{
    use QueryBuilderTrait;

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = EventMember::query();

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
        return EventMember::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(EventMemberCreate $request)
    {
        $entity = new EventMember();
        $entity->event_id = $request->event_id;
        $entity->member_id = $request->member_id;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(EventMember $entity): bool
    {
        return $entity->delete();
    }
}
