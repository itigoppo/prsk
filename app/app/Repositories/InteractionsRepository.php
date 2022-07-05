<?php

namespace App\Repositories;

use App\Http\Requests\Interactions\InteractionCreate;
use App\Http\Requests\Interactions\InteractionUpdate;
use App\Interfaces\InteractionsRepositoryInterface;
use App\Models\Interaction;
use Illuminate\Support\Str;

class InteractionsRepository implements InteractionsRepositoryInterface
{
    public function findPaginate(array $conditions = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = Interaction::query();
        $query->select([
            'interactions.*'
        ]);

        $query->leftJoin('members AS from_members', 'interactions.from_member_id', '=', 'from_members.id');
        $query->leftJoin('units AS from_units', 'from_members.unit_id', '=', 'from_units.id');
        $query->leftJoin('members AS to_members', 'interactions.to_member_id', '=', 'to_members.id');
        $query->leftJoin('units AS to_units', 'to_members.unit_id', '=', 'to_units.id');

        if (!empty($conditions)) {
            foreach ($conditions as $condition) {
                switch ($condition['type']) {
                    case 'where':
                        $query->where($condition['column'], $condition['operator'], $condition['value']);
                        break;
                    case 'whereIn':
                        $query->whereIn($condition['column'], $condition['values']);
                        break;
                    case 'whereNotNull':
                        $query->whereNotNull($condition['column']);
                        break;
                    case 'whereNull':
                        $query->whereNull($condition['column']);
                        break;
                }
            }
        }

        if (empty($order)) {
            $order = [
                'from_units.id' => 'asc',
                'from_members.id' => 'asc',
                'to_units.id' => 'asc',
                'to_members.id' => 'asc',
                'interactions.id' => 'asc',
            ];
        }

        foreach ($order as $key => $value) {
            $query->orderBy($key, $value);
        }

        return $query->paginate($limit);
    }

    public function findAll(array $search = [], array $order = [])
    {
        $query = Interaction::query();

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

        return Interaction::query()->where($where)->first();
    }

    public function create(InteractionCreate $request): bool
    {
        $entity = new Interaction();
        $entity->from_member_id = $request->from_member_id;
        $entity->from_line = $request->from_line;
        $entity->to_member_id = $request->to_member_id;
        $entity->to_line = $request->to_line;
        $entity->file = $request->file_path;
        $entity->note = $request->note;

        return $entity->save();
    }

    public function update(Interaction $entity, InteractionUpdate $request): bool
    {
        $entity->from_member_id = $request->from_member_id;
        $entity->from_line = $request->from_line;
        $entity->to_member_id = $request->to_member_id;
        $entity->to_line = $request->to_line;
        $entity->file = $request->file_path;
        $entity->note = $request->note;


        return $entity->save();
    }

    public function delete(Interaction $entity): bool
    {
        return $entity->delete();
    }
}
