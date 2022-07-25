<?php

namespace App\Repositories;

use App\Http\Requests\Singers\SingerCreate;
use App\Interfaces\SingersRepositoryInterface;
use App\Models\Singer;
use App\Traits\QueryBuilderTrait;

class SingersRepository implements SingersRepositoryInterface
{
    use QueryBuilderTrait;

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = Singer::query();

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
        return Singer::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(SingerCreate $request)
    {
        $entity = new Singer();
        $entity->type = $request->type;
        $entity->vocal_key = $request->vocal_key;
        $entity->tune_id = $request->tune_id;
        $entity->member_id = $request->member_id;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(Singer $entity): bool
    {
        return $entity->delete();
    }
}
