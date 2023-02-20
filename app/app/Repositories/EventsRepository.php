<?php

namespace App\Repositories;

use App\Http\Requests\Events\EventCreate;
use App\Http\Requests\Events\EventUpdate;
use App\Interfaces\EventsRepositoryInterface;
use App\Models\Event;
use App\Models\EventMember;
use App\Traits\QueryBuilderTrait;
use Illuminate\Database\Eloquent\Builder;

class EventsRepository implements EventsRepositoryInterface
{
    use QueryBuilderTrait;

    public function findPaginate(array $conditions = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = Event::query();

        $query = $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'starts_at' => 'desc',
            ];
        }
        $this->addOrderBy($query, $order);

        $query->select([
            '*',
        ]);
        $this->addUnitCountToSelect($query);

        return $query->paginate($limit);
    }

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = Event::query();

        $query = $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'starts_at' => 'desc',
            ];
        }
        $this->addOrderBy($query, $order);

        $query->select([
            '*',
        ]);
        $this->addUnitCountToSelect($query);

        return $query->get();
    }

    public function findOne($id)
    {
        $query = Event::query();

        $query->select([
            '*',
        ]);
        $this->addUnitCountToSelect($query);

        return $query->where($this->getFindOneCondition($id))->first();
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function addUnitCountToSelect(Builder $query): \Illuminate\Database\Eloquent\Builder
    {
        $subQuery = EventMember::query()
            ->selectRaw('count(distinct unit_id)')
            ->leftJoin('members', 'members.id', '=', 'event_members.member_id')
            ->whereColumn('event_members.event_id', 'events.id');

        $query->selectSub($subQuery, 'unit_count');

        return $query;
    }

    public function create(EventCreate $request)
    {
        $entity = new Event();
        $entity->starts_at = $request->starts_at;
        $entity->ends_at = $request->ends_at;
        $entity->name = $request->name;
        $entity->type = $request->type;
        $entity->attribute = $request->attribute;
        $entity->tune_id = $request->tune_id;
        $entity->is_key_story = $request->get('is_key_story', false);
        $entity->story_chapter = $request->story_chapter;
        $entity->stamp_member_id = $request->stamp_member_id;
        $entity->stamp_text = $request->stamp_text;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function update(Event $entity, EventUpdate $request)
    {
        $entity->starts_at = $request->starts_at;
        $entity->ends_at = $request->ends_at;
        $entity->name = $request->name;
        $entity->type = $request->type;
        $entity->attribute = $request->attribute;
        $entity->tune_id = $request->tune_id;
        $entity->is_key_story = $request->get('is_key_story', false);
        $entity->story_chapter = $request->story_chapter;
        $entity->stamp_member_id = $request->stamp_member_id;
        $entity->stamp_text = $request->stamp_text;

        if (!$entity->save()) {
            return false;
        }

        return $entity;
    }

    public function delete(Event $entity): bool
    {
        return $entity->delete();
    }
}
