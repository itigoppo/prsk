<?php

namespace App\Services;

use App\Http\Requests\Cards\CardCreate;
use App\Http\Requests\Cards\CardUpdate;
use App\Models\Card;
use App\Repositories\CardsRepository;
use App\Traits\FileUploadTrait;

class CardsService
{
    private $cardsRepository;

    use FileUploadTrait;

    /**
     * @param \App\Repositories\CardsRepository $cardsRepository
     */
    public function __construct(CardsRepository $cardsRepository)
    {
        $this->cardsRepository = $cardsRepository;
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

        return $this->cardsRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $query
     * @param array $order
     * @return \App\Models\Card[]|CardsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $query = [], array $order = [])
    {
        $search = [];

        if (!empty($query['mids'])) {
            $search[] = [
                'type' => 'whereIn',
                'column' => 'member_id',
                'values' => $query['mids'],
            ];
        }
        // released_at before
        if (!empty($query['ratb'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'released_at',
                'operator' => '<=',
                'value' => $query['ratb'],
            ];
        }
        if (!empty($query['at'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'attribute',
                'operator' => '=',
                'value' => $query['at'],
            ];
        }

        return $this->cardsRepository->findAll($search, $order);
    }

    /**
     * @param int|string $id
     * @return \App\Models\Card|CardsRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->cardsRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\Cards\CardCreate $request
     * @return bool
     */
    public function create(CardCreate $request): bool
    {
        $request->normal_file_path = $this->fileCreate($request, 'normal_file', Card::FILE_PATH);
        $request->after_training_file_path = $this->fileCreate($request, 'after_training_file', Card::FILE_PATH);

        return $this->cardsRepository->create($request);
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\Cards\CardUpdate $request
     * @return bool
     */
    public function update($id, CardUpdate $request): bool
    {
        $entity = $this->cardsRepository->findOne($id);

        // 特訓前
        $request->normal_file_path = $this->fileUpdate($request, $entity, 'normal_file', Card::FILE_PATH);

        // 特訓後
        $request->after_training_file_path = $this->fileUpdate($request, $entity, 'after_training_file', Card::FILE_PATH);

        return $this->cardsRepository->update($entity, $request);
    }

    /**
     * @param int|string $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $entity = $this->cardsRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->cardsRepository->delete($entity);
    }
}
