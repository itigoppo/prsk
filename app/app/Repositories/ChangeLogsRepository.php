<?php

namespace App\Repositories;

use App\Http\Requests\ChangeLogs\ChangeLogCreate;
use App\Http\Requests\ChangeLogs\ChangeLogUpdate;
use App\Interfaces\ChangeLogsRepositoryInterface;
use App\Models\ChangeLog;
use App\Traits\QueryBuilderTrait;

class ChangeLogsRepository implements ChangeLogsRepositoryInterface
{
    use QueryBuilderTrait;

    public function findPaginate(array $conditions = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = ChangeLog::query();

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
        $query = ChangeLog::query();

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
        return ChangeLog::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(ChangeLogCreate $request): bool
    {
        $entity = new ChangeLog();
        $entity->type = $request->type;
        $entity->note = $request->note;
        $entity->released_at = $request->released_at;

        return $entity->save();
    }

    public function update(ChangeLog $entity, ChangeLogUpdate $request): bool
    {
        $entity->note = $request->note;
        $entity->released_at = $request->released_at;

        return $entity->save();
    }

    public function delete(ChangeLog $entity): bool
    {
        return $entity->delete();
    }
}
