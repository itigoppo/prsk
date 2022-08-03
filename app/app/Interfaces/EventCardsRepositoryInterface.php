<?php
namespace App\Interfaces;

use App\Http\Requests\EventCards\EventCardCreate;
use App\Models\EventCard;

interface EventCardsRepositoryInterface
{
    /**
     * @param array $conditions
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $conditions = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\EventCard|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\EventCards\EventCardCreate $request
     * @return \App\Models\EventCard|bool
     */
    public function create(EventCardCreate $request);

    /**
     * @param \App\Models\EventCard $entity
     * @return bool
     */
    public function delete(EventCard $entity): bool;
}
