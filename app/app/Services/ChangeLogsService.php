<?php

namespace App\Services;

use App\Http\Requests\ChangeLogs\ChangeLogCreate;
use App\Http\Requests\ChangeLogs\ChangeLogUpdate;
use App\Repositories\ChangeLogsRepository;

class ChangeLogsService
{
    private $changeLogsRepository;

    /**
     * @param \App\Repositories\ChangeLogsRepository $changeLogsRepository
     */
    public function __construct(ChangeLogsRepository $changeLogsRepository)
    {
        $this->changeLogsRepository = $changeLogsRepository;
    }

    /**
     * @param array $query
     * @param array $order
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findPaginate(array $query = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $search = [];
        if (!empty($query['tp'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'type',
                'operator' => '=',
                'value' => $query['tp'],
            ];
        }

        return $this->changeLogsRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $search
     * @param array $order
     * @return \App\Models\ChangeLog[]|ChangeLogsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $search = [], array $order = [])
    {
        return $this->changeLogsRepository->findAll($search, $order);
    }

    /**
     * @param $id
     * @return \App\Models\ChangeLog|ChangeLogsRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->changeLogsRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\ChangeLogs\ChangeLogCreate $request
     * @return bool
     */
    public function create(ChangeLogCreate $request): bool
    {
        return $this->changeLogsRepository->create($request);
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\ChangeLogs\ChangeLogUpdate $request
     * @return bool
     */
    public function update($id, ChangeLogUpdate $request): bool
    {
        $entity = $this->changeLogsRepository->findOne($id);

        return $this->changeLogsRepository->update($entity, $request);
    }

    /**
     * @param int|string $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $entity = $this->changeLogsRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->changeLogsRepository->delete($entity);
    }
}
