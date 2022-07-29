<?php

namespace App\Services;

use App\Http\Requests\Dancers\DancerCreate;
use App\Http\Requests\Tunes\TuneCreate;
use App\Http\Requests\Tunes\TuneUpdate;
use App\Http\Requests\Singers\SingerCreate;
use App\Models\Dancer;
use App\Models\Singer;
use App\Repositories\DancersRepository;
use App\Repositories\TunesRepository;
use App\Repositories\SingersRepository;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TunesService
{
    private $tunesRepository;
    private $singersRepository;
    private $dancersRepository;

    /**
     * @param \App\Repositories\TunesRepository $tunesRepository
     * @param \App\Repositories\SingersRepository $singersRepository
     * @param \App\Repositories\DancersRepository $dancersRepository
     */
    public function __construct(
        TunesRepository   $tunesRepository,
        SingersRepository $singersRepository,
        DancersRepository $dancersRepository
    )
    {
        $this->tunesRepository = $tunesRepository;
        $this->singersRepository = $singersRepository;
        $this->dancersRepository = $dancersRepository;
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
        if (!empty($query['tp'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'type',
                'operator' => '=',
                'value' => $query['tp'],
            ];
        }

        return $this->tunesRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $search
     * @param array $order
     * @return \App\Models\Tune[]|TunesRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $query = [], array $order = [])
    {
        $search = [];
        if (!empty($query['tp'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'type',
                'operator' => '=',
                'value' => $query['tp'],
            ];
        }

        return $this->tunesRepository->findAll($search, $order);
    }

    /**
     * @param $id
     * @return \App\Models\Tune|TunesRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->tunesRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\Tunes\TuneCreate $request
     * @return bool
     */
    public function create(TuneCreate $request): bool
    {
        DB::transaction(function () use ($request) {
            if (!$entity = $this->tunesRepository->create($request)) {
                throw new InvalidArgumentException('楽曲情報の保存に失敗しました');
            }

            if (!empty($request->dancers)) {
                foreach ($request->dancers as $memberId) {
                    $dancer = [
                        'tune_id' => $entity->id,
                        'member_id' => $memberId,
                    ];
                    $requestDancer = new DancerCreate($dancer);
                    $validator = Validator::make($requestDancer->toArray(), $requestDancer->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('MVメンバー情報の保存に失敗しました');
                    }

                    if (!$this->dancersRepository->create($requestDancer)) {
                        throw new InvalidArgumentException('MVメンバー情報の保存に失敗しました');
                    }
                }
            }

            if (!empty($request->singers)) {
                foreach ($request->singers as $singers) {
                    if (empty($singers['members'])) {
                        continue;
                    }

                    foreach ($singers['members'] as $memberId) {
                        $singer = [
                            'type' => $singers['type'],
                            'vocal_key' => $singers['key'],
                            'tune_id' => $entity->id,
                            'member_id' => $memberId,
                        ];
                        $requestSingers = new SingerCreate($singer);
                        $validator = Validator::make($requestSingers->toArray(), $requestSingers->rules());

                        if ($validator->fails()) {
                            throw new InvalidArgumentException('ボーカル情報の保存に失敗しました');
                        }

                        if (!$this->singersRepository->create($requestSingers)) {
                            throw new InvalidArgumentException('ボーカル情報の保存に失敗しました');
                        }
                    }
                }
            }
        });

        return true;
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\Tunes\TuneUpdate $request
     * @return bool
     */
    public function update($id, TuneUpdate $request): bool
    {
        DB::transaction(function () use ($id, $request) {
            $entity = $this->tunesRepository->findOne($id);

            if (!$this->tunesRepository->update($entity, $request)) {
                throw new InvalidArgumentException('楽曲情報の保存に失敗しました');
            }

            if (!empty($request->dancers)) {
                Dancer::query()->where([
                    'tune_id' => $entity->id,
                ])->delete();

                foreach ($request->dancers as $memberId) {
                    $dancer = [
                        'tune_id' => $entity->id,
                        'member_id' => $memberId,
                    ];
                    $requestDancer = new DancerCreate($dancer);
                    $validator = Validator::make($requestDancer->toArray(), $requestDancer->rules());

                    if ($validator->fails()) {
                        throw new InvalidArgumentException('MVメンバー情報の保存に失敗しました');
                    }

                    if (!$this->dancersRepository->create($requestDancer)) {
                        throw new InvalidArgumentException('MVメンバー情報の保存に失敗しました');
                    }
                }
            }

            if (!empty($request->singers)) {
                Singer::query()->where([
                    'tune_id' => $entity->id,
                ])->delete();

                foreach ($request->singers as $singers) {
                    if (empty($singers['members'])) {
                        continue;
                    }

                    foreach ($singers['members'] as $memberId) {
                        $singer = [
                            'type' => $singers['type'],
                            'vocal_key' => $singers['key'],
                            'tune_id' => $entity->id,
                            'member_id' => $memberId,
                        ];
                        $requestSingers = new SingerCreate($singer);
                        $validator = Validator::make($requestSingers->toArray(), $requestSingers->rules());

                        if ($validator->fails()) {
                            throw new InvalidArgumentException('ボーカル情報の保存に失敗しました');
                        }

                        if (!$this->singersRepository->create($requestSingers)) {
                            throw new InvalidArgumentException('ボーカル情報の保存に失敗しました');
                        }
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
        $entity = $this->tunesRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->tunesRepository->delete($entity);
    }
}
