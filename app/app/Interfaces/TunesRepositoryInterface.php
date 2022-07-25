<?php
namespace App\Interfaces;

use App\Http\Requests\Tunes\TuneCreate;
use App\Http\Requests\Tunes\TuneUpdate;
use App\Models\Tune;

interface TunesRepositoryInterface
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
     * @return \App\Models\Tune|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Tunes\TuneCreate $request
     * @return \App\Models\Tune|bool
     */
    public function create(TuneCreate $request);

    /**
     * @param \App\Models\Tune $entity
     * @param \App\Http\Requests\Tunes\TuneUpdate $request
     * @return \App\Models\Tune|bool
     */
    public function update(Tune $entity, TuneUpdate $request);

    /**
     * @param \App\Models\Tune $entity
     * @return bool
     */
    public function delete(Tune $entity): bool;
}
