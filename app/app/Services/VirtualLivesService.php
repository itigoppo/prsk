<?php

namespace App\Services;

use App\Http\Requests\VirtualLiveTunes\VirtualLiveTuneCreate;
use App\Http\Requests\VirtualLiveMembers\VirtualLiveMemberCreate;
use App\Http\Requests\VirtualLives\VirtualLiveCreate;
use App\Http\Requests\VirtualLives\VirtualLiveUpdate;
use App\Models\VirtualLiveTune;
use App\Models\VirtualLiveMember;
use App\Repositories\VirtualLiveTunesRepository;
use App\Repositories\VirtualLiveMembersRepository;
use App\Repositories\VirtualLivesRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class VirtualLivesService
{
    private $virtualLivesRepository;
    private $virtualLiveTunesRepository;
    private $virtualLiveMembersRepository;

    /**
     * @param \App\Repositories\VirtualLivesRepository $virtualLivesRepository
     * @param \App\Repositories\VirtualLiveTunesRepository $virtualLiveTunesRepository
     * @param \App\Repositories\VirtualLiveMembersRepository $virtualLiveMembersRepository
     */
    public function __construct(
        VirtualLivesRepository       $virtualLivesRepository,
        VirtualLiveTunesRepository   $virtualLiveTunesRepository,
        VirtualLiveMembersRepository $virtualLiveMembersRepository
    )
    {
        $this->virtualLivesRepository = $virtualLivesRepository;
        $this->virtualLiveTunesRepository = $virtualLiveTunesRepository;
        $this->virtualLiveMembersRepository = $virtualLiveMembersRepository;
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

        return $this->virtualLivesRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $search
     * @param array $order
     * @return \App\Models\VirtualLive[]|VirtualLivesRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $query = [], array $order = [])
    {
        $search = [];

        return $this->virtualLivesRepository->findAll($search, $order);
    }

    /**
     * @param $id
     * @return \App\Models\VirtualLive|VirtualLivesRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->virtualLivesRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\VirtualLives\VirtualLiveCreate $request
     * @return bool
     */
    public function create(VirtualLiveCreate $request): bool
    {
        DB::transaction(function () use ($request) {
            if (!$entity = $this->virtualLivesRepository->create($request)) {
                throw new InvalidArgumentException('バーチャルライブ情報の保存に失敗しました');
            }

            if (!empty($request->virtual_live_members)) {
                foreach ($request->virtual_live_members as $memberId) {
                    $virtualLiveMember = [
                        'virtual_live_id' => $entity->id,
                        'member_id' => $memberId,
                    ];
                    $requestVirtualLiveMember = new VirtualLiveMemberCreate($virtualLiveMember);
                    $validator = Validator::make($requestVirtualLiveMember->toArray(), $requestVirtualLiveMember->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('参加メンバー情報の保存に失敗しました');
                    }

                    if (!$this->virtualLiveMembersRepository->create($requestVirtualLiveMember)) {
                        throw new InvalidArgumentException('参加メンバー情報の保存に失敗しました');
                    }
                }
            }

            if (!empty($request->virtual_live_tunes)) {
                foreach ($request->virtual_live_tunes as $virtualLiveTune) {
                    if (empty($virtualLiveTune['tune_id'])) {
                        continue;
                    }
                    $virtualLiveTune['virtual_live_id'] = $entity->id;
                    $requestVirtualLiveTune = new VirtualLiveTuneCreate($virtualLiveTune);
                    $validator = Validator::make($requestVirtualLiveTune->toArray(), $requestVirtualLiveTune->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('演奏曲情報の保存に失敗しました');
                    }

                    if (!$this->virtualLiveTunesRepository->create($requestVirtualLiveTune)) {
                        throw new InvalidArgumentException('演奏曲情報の保存に失敗しました');
                    }
                }
            }
        });

        return true;
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\VirtualLives\VirtualLiveUpdate $request
     * @return bool
     */
    public function update($id, VirtualLiveUpdate $request): bool
    {
        DB::transaction(function () use ($id, $request) {
            $entity = $this->virtualLivesRepository->findOne($id);

            if (!$this->virtualLivesRepository->update($entity, $request)) {
                throw new InvalidArgumentException('バーチャルライブ情報の保存に失敗しました');
            }

            if (!empty($request->virtual_live_members)) {
                VirtualLiveMember::query()->where([
                    'virtual_live_id' => $entity->id,
                ])->delete();

                foreach ($request->virtual_live_members as $memberId) {
                    $virtualLiveMember = [
                        'virtual_live_id' => $entity->id,
                        'member_id' => $memberId,
                    ];
                    $requestVirtualLiveMember = new VirtualLiveMemberCreate($virtualLiveMember);
                    $validator = Validator::make($requestVirtualLiveMember->toArray(), $requestVirtualLiveMember->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('参加メンバー情報の保存に失敗しました');
                    }

                    if (!$this->virtualLiveMembersRepository->create($requestVirtualLiveMember)) {
                        throw new InvalidArgumentException('参加メンバー情報の保存に失敗しました');
                    }
                }
            }

            if (!empty($request->virtual_live_tunes)) {
                VirtualLiveTune::query()->where([
                    'virtual_live_id' => $entity->id,
                ])->delete();

                foreach ($request->virtual_live_tunes as $virtualLiveTune) {
                    if (empty($virtualLiveTune['tune_id'])) {
                        continue;
                    }
                    $virtualLiveTune['virtual_live_id'] = $entity->id;
                    $requestVirtualLiveTune = new VirtualLiveTuneCreate($virtualLiveTune);
                    $validator = Validator::make($requestVirtualLiveTune->toArray(), $requestVirtualLiveTune->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('演奏曲情報の保存に失敗しました');
                    }

                    if (!$this->virtualLiveTunesRepository->create($requestVirtualLiveTune)) {
                        throw new InvalidArgumentException('演奏曲情報の保存に失敗しました');
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
        $entity = $this->virtualLivesRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->virtualLivesRepository->delete($entity);
    }
}
