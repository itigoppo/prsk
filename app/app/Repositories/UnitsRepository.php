<?php

namespace App\Repositories;

use App\Http\Requests\Units\UnitCreate;
use App\Http\Requests\Units\UnitUpdate;
use App\Interfaces\UnitsRepositoryInterface;
use App\Models\Unit;
use App\Traits\QueryBuilderTrait;

class UnitsRepository implements UnitsRepositoryInterface
{
    use QueryBuilderTrait;

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = Unit::query();

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
        return Unit::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(UnitCreate $request): bool
    {
        $entity = new Unit();
        $entity->name = $request->name;
        $entity->short = $request->short;
        $entity->color = $request->color;
        $entity->bg_color = $request->bg_color;
        $entity->is_active = $request->get('is_active', false);
        return $entity->save();
    }

    public function update(Unit $entity, UnitUpdate $request): bool
    {
        $entity->name = $request->name;
        $entity->short = $request->short;
        $entity->color = $request->color;
        $entity->bg_color = $request->bg_color;
        $entity->is_active = $request->get('is_active', false);
        return $entity->save();
    }

    public function delete(Unit $entity): bool
    {
        return $entity->delete();
    }
}
