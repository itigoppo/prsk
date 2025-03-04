<?php

namespace App\Services;

use App\Http\Requests\Members\MemberCreate;
use App\Http\Requests\Members\MemberUpdate;
use App\Repositories\MembersRepository;

class MembersService
{
    private $membersRepository;

    /**
     * @param \App\Repositories\MembersRepository $membersRepository
     */
    public function __construct(MembersRepository $membersRepository)
    {
        $this->membersRepository = $membersRepository;
    }

    /**
     * @param array $query
     * @param array $order
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Collection
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

        return $this->membersRepository->findAll($search, $order);
    }

    /**
     * @param int|string $id
     * @return \App\Models\Member|MembersRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->membersRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\Members\MemberCreate $request
     * @return bool
     */
    public function create(MemberCreate $request): bool
    {
        return $this->membersRepository->create($request);
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\Members\MemberUpdate $request
     * @return bool
     */
    public function update($id, MemberUpdate $request): bool
    {
        $entity = $this->membersRepository->findOne($id);

        return $this->membersRepository->update($entity, $request);
    }

    /**
     * @param int|string $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $entity = $this->membersRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->membersRepository->delete($entity);
    }
}
