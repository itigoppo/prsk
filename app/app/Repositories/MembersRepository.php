<?php

namespace App\Repositories;

use App\Http\Requests\Members\MemberCreate;
use App\Http\Requests\Members\MemberUpdate;
use App\Interfaces\MembersRepositoryInterface;
use App\Models\Member;
use Illuminate\Support\Str;

class MembersRepository implements MembersRepositoryInterface
{
    public function findAll(array $search = [], array $order = [])
    {
        $query = Member::query();

        if (!empty($search)) {
            $query->where($search);
        }

        if (!empty($order)) {
            foreach ($order as $key => $value)
                $query->orderBy($key, $value);
        } else {
            $query->orderBy('id');
        }

        return $query->get();
    }

    public function findOne($id)
    {
        $where = [
            'id' => $id,
        ];

        if (Str::isUuid($id)) {
            $where = [
                'uuid' => $id,
            ];
        }

        return Member::query()->where($where)->first();
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
        $entity->is_active = $request->is_active;

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
        $entity->is_active = $request->is_active;

        return $entity->save();
    }

    public function delete(Member $entity): bool
    {
        return $entity->delete();
    }
}
