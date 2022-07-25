<?php
namespace App\Interfaces;

use App\Http\Requests\Dancers\DancerCreate;
use App\Models\Dancer;

interface DancersRepositoryInterface
{
    /**
     * @param array $conditions
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $conditions = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\Dancer|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Dancers\DancerCreate $request
     * @return \App\Models\Dancer|bool
     */
    public function create(DancerCreate $request);

    /**
     * @param \App\Models\Dancer $entity
     * @return bool
     */
    public function delete(Dancer $entity): bool;
}
