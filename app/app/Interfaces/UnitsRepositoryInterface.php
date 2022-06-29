<?php
namespace App\Interfaces;

use App\Http\Requests\Units\UnitCreate;
use App\Http\Requests\Units\UnitUpdate;
use App\Models\Unit;

interface UnitsRepositoryInterface
{
    /**
     * @param array $search
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $search = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\Unit|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Units\UnitCreate $request
     * @return bool
     */
    public function create(UnitCreate $request): bool;

    /**
     * @param \App\Models\Unit $entity
     * @param \App\Http\Requests\Units\UnitUpdate $request
     * @return bool
     */
    public function update(Unit $entity, UnitUpdate $request): bool;

    /**
     * @param \App\Models\Unit $entity
     * @return bool
     */
    public function delete(Unit $entity): bool;
}
