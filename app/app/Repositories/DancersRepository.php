<?php

namespace App\Repositories;

use App\Http\Requests\Dancers\DancerCreate;
use App\Interfaces\DancersRepositoryInterface;
use App\Models\Dancer;
use App\Traits\QueryBuilderTrait;

class DancersRepository implements DancersRepositoryInterface
{
    use QueryBuilderTrait;

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = Dancer::query();

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
        return Dancer::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(DancerCreate $request)
    {
        $entity = new Dancer();
        $entity->tune_id = $request->tune_id;
        $entity->member_id = $request->member_id;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(Dancer $entity): bool
    {
        return $entity->delete();
    }
}
