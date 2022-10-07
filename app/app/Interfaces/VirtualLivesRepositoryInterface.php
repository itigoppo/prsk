<?php
namespace App\Interfaces;

use App\Http\Requests\VirtualLives\VirtualLiveCreate;
use App\Http\Requests\VirtualLives\VirtualLiveUpdate;
use App\Models\VirtualLive;

interface VirtualLivesRepositoryInterface
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
     * @return \App\Models\VirtualLive|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\VirtualLives\VirtualLiveCreate $request
     * @return \App\Models\VirtualLive|bool
     */
    public function create(VirtualLiveCreate $request);

    /**
     * @param \App\Models\VirtualLive $entity
     * @param \App\Http\Requests\VirtualLives\VirtualLiveUpdate $request
     * @return \App\Models\VirtualLive|bool
     */
    public function update(VirtualLive $entity, VirtualLiveUpdate $request);

    /**
     * @param \App\Models\VirtualLive $entity
     * @return bool
     */
    public function delete(VirtualLive $entity): bool;
}
