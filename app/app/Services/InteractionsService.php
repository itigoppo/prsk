<?php

namespace App\Services;

use App\Http\Requests\Interactions\InteractionCreate;
use App\Http\Requests\Interactions\InteractionUpdate;
use App\Models\Interaction;
use App\Repositories\InteractionsRepository;
use App\Traits\FileUploadTrait;

class InteractionsService
{
    use FileUploadTrait;

    private $interactionsRepository;

    /**
     * @param \App\Repositories\InteractionsRepository $interactionsRepository
     */
    public function __construct(InteractionsRepository $interactionsRepository)
    {
        $this->interactionsRepository = $interactionsRepository;
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
        if (!empty($query['fmids'])) {
            $search[] = [
                'type' => 'whereIn',
                'column' => 'interactions.from_member_id',
                'values' => $query['fmids'],
            ];
        }
        if (!empty($query['tmids'])) {
            $search[] = [
                'type' => 'whereIn',
                'column' => 'interactions.to_member_id',
                'values' => $query['tmids'],
            ];
        }
        if (!empty($query['hasf']) && $query['hasf'] === '1') {
            $search[] = [
                'type' => 'whereNotNull',
                'column' => 'interactions.file',
            ];
        }
        if (!empty($query['hasf']) && $query['hasf'] === '2') {
            $search[] = [
                'type' => 'whereNull',
                'column' => 'interactions.file',
            ];
        }
        if (!empty($query['wdh'])) {
            $search[] = [
                'type' => 'where',
                'closure' => [
                    [
                        'type' => 'orWhere',
                        'column' => 'interactions.from_line',
                        'operator' => 'like',
                        'value' => '%わんだほ%',
                    ],
                    [
                        'type' => 'orWhere',
                        'column' => 'interactions.to_line',
                        'operator' => 'like',
                        'value' => '%わんだほ%',
                    ],
                ],
            ];
        }
        if (!empty($query['bonds'])) {
            $search[] = [
                'type' => 'whereNotNull',
                'column' => 'interactions.note',
            ];
        }

        return $this->interactionsRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $search
     * @param array $order
     * @return \App\Models\Interaction[]|InteractionsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $search = [], array $order = [])
    {
        return $this->interactionsRepository->findAll($search, $order);
    }

    /**
     * @param $id
     * @return \App\Models\Interaction|InteractionsRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->interactionsRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\Interactions\InteractionCreate $request
     * @return bool
     */
    public function create(InteractionCreate $request): bool
    {
        $request->file_path = $this->fileCreate($request, 'file', Interaction::FILE_PATH);

        return $this->interactionsRepository->create($request);
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\Interactions\InteractionUpdate $request
     * @return bool
     */
    public function update($id, InteractionUpdate $request): bool
    {
        $entity = $this->interactionsRepository->findOne($id);

        $request->file_path = $this->fileUpdate($request, $entity, 'file', Interaction::FILE_PATH);

        return $this->interactionsRepository->update($entity, $request);
    }

    /**
     * @param int|string $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $entity = $this->interactionsRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->interactionsRepository->delete($entity);
    }
}
