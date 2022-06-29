<?php

namespace App\Repositories;

use App\Http\Requests\Units\UnitCreate;
use App\Http\Requests\Units\UnitUpdate;
use App\Interfaces\UnitsRepositoryInterface;
use App\Models\Unit;
use Illuminate\Support\Str;

class UnitsRepository implements UnitsRepositoryInterface
{
    public function findAll(array $search = [], array $order = [])
    {
        $query = Unit::query();

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

        return Unit::query()->where($where)->first();
    }

    public function create(UnitCreate $request): bool
    {
        $entity = new Unit();
        $entity->name = $request->name;
        $entity->short = $request->short;
        $entity->color = $request->color;
        $entity->bg_color = $request->bg_color;
        return $entity->save();
    }

    public function update(Unit $entity, UnitUpdate $request): bool
    {
        $entity->name = $request->name;
        $entity->short = $request->short;
        $entity->color = $request->color;
        $entity->bg_color = $request->bg_color;
        return $entity->save();
    }

    public function delete(Unit $entity): bool
    {
        return $entity->delete();
    }
}
