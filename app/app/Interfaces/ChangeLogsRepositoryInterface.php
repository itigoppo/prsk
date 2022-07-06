<?php
namespace App\Interfaces;

use App\Http\Requests\ChangeLogs\ChangeLogCreate;
use App\Http\Requests\ChangeLogs\ChangeLogUpdate;
use App\Models\ChangeLog;

interface ChangeLogsRepositoryInterface
{
    /**
     * @param array $conditions
     * @param array $order
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findPaginate(array $conditions = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator;

    /**
     * @param array $conditions
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $conditions = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\ChangeLog|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\ChangeLogs\ChangeLogCreate $request
     * @return bool
     */
    public function create(ChangeLogCreate $request): bool;

    /**
     * @param \App\Models\ChangeLog $entity
     * @param \App\Http\Requests\ChangeLogs\ChangeLogUpdate $request
     * @return bool
     */
    public function update(ChangeLog $entity, ChangeLogUpdate $request): bool;

    /**
     * @param \App\Models\ChangeLog $entity
     * @return bool
     */
    public function delete(ChangeLog $entity): bool;
}
