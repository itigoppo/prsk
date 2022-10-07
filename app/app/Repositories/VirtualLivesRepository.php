<?php

namespace App\Repositories;

use App\Http\Requests\VirtualLives\VirtualLiveCreate;
use App\Http\Requests\VirtualLives\VirtualLiveUpdate;
use App\Interfaces\VirtualLivesRepositoryInterface;
use App\Models\VirtualLive;
use App\Traits\QueryBuilderTrait;

class VirtualLivesRepository implements VirtualLivesRepositoryInterface
{
    use QueryBuilderTrait;

    public function findPaginate(array $conditions = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = VirtualLive::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'starts_at' => 'desc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->paginate($limit);
    }

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = VirtualLive::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'starts_at' => 'desc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->get();
    }

    public function findOne($id)
    {
        return VirtualLive::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(VirtualLiveCreate $request)
    {
        $entity = new VirtualLive();
        $entity->starts_at = $request->starts_at;
        $entity->ends_at = $request->ends_at;
        $entity->name = $request->name;
        $entity->event_id = $request->event_id;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function update(VirtualLive $entity, VirtualLiveUpdate $request)
    {
        $entity->starts_at = $request->starts_at;
        $entity->ends_at = $request->ends_at;
        $entity->name = $request->name;
        $entity->event_id = $request->event_id;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(VirtualLive $entity): bool
    {
        return $entity->delete();
    }
}
