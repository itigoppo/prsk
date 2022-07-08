<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait QueryBuilderTrait
{
    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array $conditions
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function addConditions(Builder $query, array $conditions = []): \Illuminate\Database\Eloquent\Builder
    {
        if (!empty($conditions)) {
            foreach ($conditions as $condition) {
                switch ($condition['type']) {
                    case 'where':
                        if (empty($condition['closure'])) {
                            $query->where($condition['column'], $condition['operator'], $condition['value']);
                        } else {
                            $closure = $condition['closure'];
                            $query->where(function ($q) use ($closure) {
                                $q = $this->addConditions($q, $closure);
                            });
                        }
                        break;
                    case 'orWhere':
                        if (empty($condition['closure'])) {
                            $query->orWhere($condition['column'], $condition['operator'], $condition['value']);
                        } else {
                            $closure = $condition['closure'];
                            $query->where(function ($q) use ($closure) {
                                $q = $this->addConditions($q, $closure);
                            });
                        }
                        break;
                    case 'whereIn':
                        $query->whereIn($condition['column'], $condition['values']);
                        break;
                    case 'whereNotNull':
                        $query->whereNotNull($condition['column']);
                        break;
                    case 'whereNull':
                        $query->whereNull($condition['column']);
                        break;
                }
            }
        }

        return $query;
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param array array
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function addOrderBy(Builder $query, array $orders = []): \Illuminate\Database\Eloquent\Builder
    {
        if (!empty($orders)) {
            foreach ($orders as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        return $query;
    }

    /**
     * @param int|string $id
     * @return array
     */
    public function getFindOneCondition($id): array
    {
        $conditions = [
            'id' => $id,
        ];

        if (Str::isUuid($id)) {
            $conditions = [
                'uuid' => $id,
            ];
        }

        return $conditions;
    }
}
