<?php
namespace App\Interfaces;

use App\Http\Requests\Singers\SingerCreate;
use App\Models\Singer;

interface SingersRepositoryInterface
{
    /**
     * @param array $conditions
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $conditions = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\Singer|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\Singers\SingerCreate $request
     * @return \App\Models\Singer|bool
     */
    public function create(SingerCreate $request);

    /**
     * @param \App\Models\Singer $entity
     * @return bool
     */
    public function delete(Singer $entity): bool;
}
