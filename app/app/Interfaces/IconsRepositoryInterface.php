<?php

namespace App\Interfaces;

use App\Http\Requests\Icons\IconCreate;
use App\Models\Icon;

interface IconsRepositoryInterface
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
     * @return \App\Models\Icon|static
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Icons\IconCreate $request
     * @return bool
     */
    public function create(IconCreate $request): bool;

    /**
     * @param \App\Models\Icon $entity
     * @return bool
     */
    public function delete(Icon $entity): bool;
}
