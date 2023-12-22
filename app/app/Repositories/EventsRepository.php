<?php

namespace App\Repositories;

use App\Http\Requests\Events\EventCreate;
use App\Http\Requests\Events\EventUpdate;
use App\Interfaces\EventsRepositoryInterface;
use App\Models\Event;
use App\Models\EventCard;
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

        $subQuery = $this->addUnitCountSubQuery();
        $query->leftJoinSub($subQuery, 'unit_count', function ($join) {
            $join->on('events.id', '=', 'unit_count.event_id');
        });

        $subQuery = $this->addLtdSubQuery();
        $query->leftJoinSub($subQuery, 'banner_card', function ($join) {
            $join->on('events.id', '=', 'banner_card.event_id');
        });

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
        $subQuery = $this->addUnitCountSubQuery();
        $query->joinSub($subQuery, 'unit_count', function ($join) {
            $join->on('events.id', '=', 'unit_count.event_id');
        });

        return $query->get();
    }

    public function findOne($id)
    {
        $query = Event::query();

        $query->select([
            '*',
        ]);
        $subQuery = $this->addUnitCountSubQuery();
        $query->joinSub($subQuery, 'unit_count', function ($join) {
            $join->on('events.id', '=', 'unit_count.event_id');
        });

        return $query->where($this->getFindOneCondition($id))->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function addUnitCountSubQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $subQuery = EventMember::query()
            ->selectRaw('count(distinct unit_id) AS unit_count')
            ->addSelect(['event_id'])
            ->leftJoin('members', 'members.id', '=', 'event_members.member_id')
            ->groupBy('event_members.event_id');

        return $subQuery;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function addLtdSubQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $subQuery = EventCard::query()
            ->select(['is_limited', 'event_id'])
            ->leftJoin('cards', 'cards.id', '=', 'event_cards.card_id')
            ->where('event_cards.is_banner', '1');

        return $subQuery;
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
