<?php

namespace App\Repositories;

use App\Http\Requests\EventCards\EventCardCreate;
use App\Interfaces\EventCardsRepositoryInterface;
use App\Models\EventCard;
use App\Traits\QueryBuilderTrait;

class EventCardsRepository implements EventCardsRepositoryInterface
{
    use QueryBuilderTrait;

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = EventCard::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'id' => 'asc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->get();
    }

    public function findOne($id)
    {
        return EventCard::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(EventCardCreate $request)
    {
        $entity = new EventCard();
        $entity->event_id = $request->event_id;
        $entity->is_banner = $request->get('is_banner', false);
        $entity->card_id = $request->card_id;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(EventCard $entity): bool
    {
        return $entity->delete();
    }
}
