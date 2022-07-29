<?php

namespace App\Services;

use App\Http\Requests\Units\UnitCreate;
use App\Http\Requests\Units\UnitUpdate;
use App\Repositories\UnitsRepository;

class UnitsService
{
    private $unitsRepository;

    /**
     * @param \App\Repositories\UnitsRepository $unitsRepository
     */
    public function __construct(UnitsRepository $unitsRepository)
    {
        $this->unitsRepository = $unitsRepository;
    }

    /**
     * @param array $query
     * @param array $order
     * @return \App\Models\Unit[]|UnitsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $query = [], array $order = [])
    {
        $search = [];
        if (!empty($query['is_active'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => $query['is_active'],
            ];
        }

        return $this->unitsRepository->findAll($search, $order);
    }

    /**
     * @param int|string $id
     * @return \App\Models\Unit|UnitsRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->unitsRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\Units\UnitCreate $request
     * @return bool
     */
    public function create(UnitCreate $request): bool
    {
        return $this->unitsRepository->create($request);
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\Units\UnitUpdate $request
     * @return bool
     */
    public function update($id, UnitUpdate $request): bool
    {
        $entity = $this->unitsRepository->findOne($id);

        return $this->unitsRepository->update($entity, $request);
    }

    /**
     * @param int|string $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $entity = $this->unitsRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->unitsRepository->delete($entity);
    }
}
