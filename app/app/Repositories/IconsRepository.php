<?php

namespace App\Repositories;

use App\Http\Requests\Icons\IconCreate;
use App\Interfaces\IconsRepositoryInterface;
use App\Models\Icon;
use App\Traits\QueryBuilderTrait;
use Illuminate\Support\Str;

class IconsRepository implements IconsRepositoryInterface
{
    use QueryBuilderTrait;

    public function findPaginate(array $conditions = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = Icon::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'id' => 'asc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->paginate($limit);
    }

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = Icon::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'id' => 'asc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->get();
    }

    public function findOne($id)
    {
        return Icon::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(IconCreate $request): bool
    {
        $entity = new Icon();
        $entity->path = $request->path;
        $entity->name = $request->name;
        $entity->mime_type = $request->mime_type;
        $entity->extension = $request->extension;
        $entity->label = $request->label;

        return $entity->save();
    }

    public function delete(Icon $entity): bool
    {
        return $entity->delete();
    }
}
