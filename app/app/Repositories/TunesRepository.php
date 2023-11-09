<?php

namespace App\Repositories;

use App\Http\Requests\Tunes\TuneCreate;
use App\Http\Requests\Tunes\TuneUpdate;
use App\Interfaces\TunesRepositoryInterface;
use App\Models\Tune;
use App\Traits\QueryBuilderTrait;

class TunesRepository implements TunesRepositoryInterface
{
    use QueryBuilderTrait;

    public function findPaginate(array $conditions = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = Tune::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'released_at' => 'desc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->paginate($limit);
    }

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = Tune::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'released_at' => 'desc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->get();
    }

    public function findOne($id)
    {
        return Tune::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(TuneCreate $request)
    {
        $entity = new Tune();
        $entity->released_at = $request->released_at;
        $entity->name = $request->name;
        $entity->type = $request->type;
        $entity->unit_id = $request->unit_id;
        $entity->has_3d_mv = $request->get('has_3d_mv', false);
        $entity->has_2d_mv = $request->get('has_2d_mv', false);
        $entity->has_original_mv = $request->get('has_original_mv', false);
        $entity->easy_level = $request->easy_level;
        $entity->normal_level = $request->normal_level;
        $entity->hard_level = $request->hard_level;
        $entity->expert_level = $request->expert_level;
        $entity->master_level = $request->master_level;
        $entity->append_level = $request->append_level;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function update(Tune $entity, TuneUpdate $request)
    {
        $entity->released_at = $request->released_at;
        $entity->name = $request->name;
        $entity->type = $request->type;
        $entity->unit_id = $request->unit_id;
        $entity->has_3d_mv = $request->get('has_3d_mv', false);
        $entity->has_2d_mv = $request->get('has_2d_mv', false);
        $entity->has_original_mv = $request->get('has_original_mv', false);
        $entity->easy_level = $request->easy_level;
        $entity->normal_level = $request->normal_level;
        $entity->hard_level = $request->hard_level;
        $entity->expert_level = $request->expert_level;
        $entity->master_level = $request->master_level;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(Tune $entity): bool
    {
        return $entity->delete();
    }
}
