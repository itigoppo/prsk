<?php
namespace App\Interfaces;

use App\Http\Requests\VirtualLiveTunes\VirtualLiveTuneCreate;
use App\Models\VirtualLiveTune;

interface VirtualLiveTunesRepositoryInterface
{
    /**
     * @param array $conditions
     * @param array $order
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function findAll(array $conditions = [], array $order = []);

    /**
     * @param int|string $id
     * @return \App\Models\VirtualLiveTune|static
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOne($id);

    /**
     * @param \App\Http\Requests\VirtualLiveTunes\VirtualLiveTuneCreate $request
     * @return \App\Models\VirtualLiveTune|bool
     */
    public function create(VirtualLiveTuneCreate $request);

    /**
     * @param \App\Models\VirtualLiveTune $entity
     * @return bool
     */
    public function delete(VirtualLiveTune $entity): bool;
}
