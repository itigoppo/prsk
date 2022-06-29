<?php

namespace App\Repositories;

use App\Http\Requests\Icons\IconCreate;
use App\Interfaces\IconsRepositoryInterface;
use App\Models\Icon;
use Illuminate\Support\Str;

class IconsRepository implements IconsRepositoryInterface
{
    public function findPaginate(array $search = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = Icon::query();

        if (!empty($search)) {
            $query->where($search);
        }

        if (!empty($order)) {
            foreach ($order as $key => $value)
                $query->orderBy($key, $value);
        } else {
            $query->orderBy('id');
        }

        return $query->paginate($limit);
    }

    public function findAll(array $search = [], array $order = [])
    {
        $query = Icon::query();

        if (!empty($search)) {
            $query->where($search);
        }

        if (!empty($order)) {
            foreach ($order as $key => $value)
                $query->orderBy($key, $value);
        } else {
            $query->orderBy('id');
        }

        return $query->get();
    }

    public function findOne($id)
    {
        $where = [
            'id' => $id,
        ];

        if (Str::isUuid($id)) {
            $where = [
                'uuid' => $id,
            ];
        }

        return Icon::query()->where($where)->first();
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
