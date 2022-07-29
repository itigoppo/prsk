<?php
namespace App\Interfaces;

use App\Http\Requests\Cards\CardCreate;
use App\Http\Requests\Cards\CardUpdate;
use App\Models\Card;

interface CardsRepositoryInterface
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
     * @return \App\Models\Card|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Cards\CardCreate $request
     * @return bool
     */
    public function create(CardCreate $request): bool;

    /**
     * @param \App\Models\Card $entity
     * @param \App\Http\Requests\Cards\CardUpdate $request
     * @return bool
     */
    public function update(Card $entity, CardUpdate $request): bool;

    /**
     * @param \App\Models\Card $entity
     * @return bool
     */
    public function delete(Card $entity): bool;
}
