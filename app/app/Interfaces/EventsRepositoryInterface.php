<?php
namespace App\Interfaces;

use App\Http\Requests\Events\EventCreate;
use App\Http\Requests\Events\EventUpdate;
use App\Models\Event;

interface EventsRepositoryInterface
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
     * @return \App\Models\Event|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Events\EventCreate $request
     * @return \App\Models\Event|bool
     */
    public function create(EventCreate $request);

    /**
     * @param \App\Models\Event $entity
     * @param \App\Http\Requests\Events\EventUpdate $request
     * @return \App\Models\Event|bool
     */
    public function update(Event $entity, EventUpdate $request);

    /**
     * @param \App\Models\Event $entity
     * @return bool
     */
    public function delete(Event $entity): bool;
}
