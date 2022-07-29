<?php

namespace App\Repositories;

use App\Http\Requests\Members\MemberCreate;
use App\Http\Requests\Members\MemberUpdate;
use App\Interfaces\MembersRepositoryInterface;
use App\Models\Member;
use App\Traits\QueryBuilderTrait;

class MembersRepository implements MembersRepositoryInterface
{
    use QueryBuilderTrait;

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = Member::query();

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
        return Member::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(MemberCreate $request): bool
    {
        $entity = new Member();
        $entity->unit_id = $request->unit_id;
        $entity->code = $request->code;
        $entity->name = $request->name;
        $entity->short = $request->short;
        $entity->color = $request->color;
        $entity->bg_color = $request->bg_color;
        $entity->is_active = $request->get('is_active', false);

        return $entity->save();
    }

    public function update(Member $entity, MemberUpdate $request): bool
    {
        $entity->unit_id = $request->unit_id;
        $entity->code = $request->code;
        $entity->name = $request->name;
        $entity->short = $request->short;
        $entity->color = $request->color;
        $entity->bg_color = $request->bg_color;
        $entity->is_active = $request->get('is_active', false);

        return $entity->save();
    }

    public function delete(Member $entity): bool
    {
        return $entity->delete();
    }
}
