<?php

namespace App\Services;

use App\Http\Requests\EventCards\EventCardCreate;
use App\Http\Requests\EventMembers\EventMemberCreate;
use App\Http\Requests\Events\EventCreate;
use App\Http\Requests\Events\EventUpdate;
use App\Models\EventCard;
use App\Models\EventMember;
use App\Repositories\EventCardsRepository;
use App\Repositories\EventMembersRepository;
use App\Repositories\EventsRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EventsService
{
    private $eventsRepository;
    private $eventCardsRepository;
    private $eventMembersRepository;

    /**
     * @param \App\Repositories\EventsRepository $eventsRepository
     * @param \App\Repositories\EventCardsRepository $eventCardsRepository
     * @param \App\Repositories\EventMembersRepository $eventMembersRepository
     */
    public function __construct(
        EventsRepository       $eventsRepository,
        EventCardsRepository   $eventCardsRepository,
        EventMembersRepository $eventMembersRepository
    )
    {
        $this->eventsRepository = $eventsRepository;
        $this->eventCardsRepository = $eventCardsRepository;
        $this->eventMembersRepository = $eventMembersRepository;
    }

    /**
     * @param array $query
     * @param array $order
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findPaginate(array $query = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $search = [];

        return $this->eventsRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $search
     * @param array $order
     * @return \App\Models\Event[]|EventsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $query = [], array $order = [])
    {
        $search = [];

        return $this->eventsRepository->findAll($search, $order);
    }

    /**
     * @param $id
     * @return \App\Models\Event|EventsRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->eventsRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\Events\EventCreate $request
     * @return bool
     */
    public function create(EventCreate $request): bool
    {
        DB::transaction(function () use ($request) {
            if (!$entity = $this->eventsRepository->create($request)) {
                throw new InvalidArgumentException('イベント情報の保存に失敗しました');
            }

            if (!empty($request->event_cards)) {
                foreach ($request->event_cards as $eventCard) {
                    if (empty($eventCard['card_id'])) {
                        continue;
                    }

                    $eventCard['event_id'] = $entity->id;
                    $requestEventCards = new EventCardCreate($eventCard);
                    $validator = Validator::make($requestEventCards->toArray(), $requestEventCards->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('イベントカード情報の保存に失敗しました');
                    }

                    if (!$this->eventCardsRepository->create($requestEventCards)) {
                        throw new InvalidArgumentException('イベントカード情報の保存に失敗しました');
                    }
                }
            }

            if (!empty($request->event_members)) {
                foreach ($request->event_members as $memberId) {
                    $eventMember = [
                        'event_id' => $entity->id,
                        'member_id' => $memberId,
                    ];
                    $requestEventMember = new EventMemberCreate($eventMember);
                    $validator = Validator::make($requestEventMember->toArray(), $requestEventMember->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('ボーナスメンバー情報の保存に失敗しました');
                    }

                    if (!$this->eventMembersRepository->create($requestEventMember)) {
                        throw new InvalidArgumentException('ボーナスメンバー情報の保存に失敗しました');
                    }
                }
            }
        });

        return true;
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\Events\EventUpdate $request
     * @return bool
     */
    public function update($id, EventUpdate $request): bool
    {
        DB::transaction(function () use ($id, $request) {
            $entity = $this->eventsRepository->findOne($id);

            if (!$this->eventsRepository->update($entity, $request)) {
                throw new InvalidArgumentException('イベント情報の保存に失敗しました');
            }

            if (!empty($request->event_cards)) {
                EventCard::query()->where([
                    'event_id' => $entity->id,
                ])->delete();

                foreach ($request->event_cards as $eventCard) {
                    if (empty($eventCard['card_id'])) {
                        continue;
                    }

                    $eventCard['event_id'] = $entity->id;
                    $requestEventCards = new EventCardCreate($eventCard);
                    $validator = Validator::make($requestEventCards->toArray(), $requestEventCards->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('イベントカード情報の保存に失敗しました');
                    }

                    if (!$this->eventCardsRepository->create($requestEventCards)) {
                        throw new InvalidArgumentException('イベントカード情報の保存に失敗しました');
                    }
                }
            }

            if (!empty($request->event_members)) {
                EventMember::query()->where([
                    'event_id' => $entity->id,
                ])->delete();

                foreach ($request->event_members as $memberId) {
                    $eventMember = [
                        'event_id' => $entity->id,
                        'member_id' => $memberId,
                    ];
                    $requestEventMember = new EventMemberCreate($eventMember);
                    $validator = Validator::make($requestEventMember->toArray(), $requestEventMember->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('ボーナスメンバー情報の保存に失敗しました');
                    }

                    if (!$this->eventMembersRepository->create($requestEventMember)) {
                        throw new InvalidArgumentException('ボーナスメンバー情報の保存に失敗しました');
                    }
                }
            }
        });

        return true;
    }

    /**
     * @param int|string $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $entity = $this->eventsRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->eventsRepository->delete($entity);
    }
}
