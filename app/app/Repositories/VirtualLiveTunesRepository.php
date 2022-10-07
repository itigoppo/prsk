<?php

namespace App\Repositories;

use App\Http\Requests\VirtualLiveTunes\VirtualLiveTuneCreate;
use App\Interfaces\VirtualLiveTunesRepositoryInterface;
use App\Models\VirtualLiveTune;
use App\Traits\QueryBuilderTrait;

class VirtualLiveTunesRepository implements VirtualLiveTunesRepositoryInterface
{
    use QueryBuilderTrait;

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = VirtualLiveTune::query();

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
        return VirtualLiveTune::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(VirtualLiveTuneCreate $request)
    {
        $entity = new VirtualLiveTune();
        $entity->virtual_live_id = $request->virtual_live_id;
        $entity->tune_id = $request->tune_id;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(VirtualLiveTune $entity): bool
    {
        return $entity->delete();
    }
}
