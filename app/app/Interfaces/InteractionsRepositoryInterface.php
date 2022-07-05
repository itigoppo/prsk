<?php
namespace App\Interfaces;

use App\Http\Requests\Interactions\InteractionCreate;
use App\Http\Requests\Interactions\InteractionUpdate;
use App\Models\Interaction;

interface InteractionsRepositoryInterface
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
     * @return \App\Models\Interaction|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Interactions\InteractionCreate $request
     * @return bool
     */
    public function create(InteractionCreate $request): bool;

    /**
     * @param \App\Models\Interaction $entity
     * @param \App\Http\Requests\Interactions\InteractionUpdate $request
     * @return bool
     */
    public function update(Interaction $entity, InteractionUpdate $request): bool;

    /**
     * @param \App\Models\Interaction $entity
     * @return bool
     */
    public function delete(Interaction $entity): bool;
}
