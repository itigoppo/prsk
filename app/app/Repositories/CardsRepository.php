<?php

namespace App\Repositories;

use App\Http\Requests\Cards\CardCreate;
use App\Http\Requests\Cards\CardUpdate;
use App\Interfaces\CardsRepositoryInterface;
use App\Models\Card;
use App\Traits\QueryBuilderTrait;

class CardsRepository implements CardsRepositoryInterface
{
    use QueryBuilderTrait;

    public function findPaginate(array $conditions = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $query = Card::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'id' => 'desc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->paginate($limit);
    }

    public function findAll(array $conditions = [], array $order = [])
    {
        $query = Card::query();

        $this->addConditions($query, $conditions);

        if (empty($order)) {
            $order = [
                'id' => 'desc',
            ];
        }
        $this->addOrderBy($query, $order);

        return $query->get();
    }

    public function findOne($id)
    {
        return Card::query()->where($this->getFindOneCondition($id))->first();
    }

    public function create(CardCreate $request): bool
    {
        $entity = new Card();
        $entity->released_at = $request->released_at;
        $entity->rarity = $request->rarity;
        $entity->attribute = $request->attribute;
        $entity->name = $request->name;
        $entity->member_id = $request->member_id;
        $entity->skill_effect = $request->skill_effect;
        $entity->skill_name = $request->skill_name;
        $entity->costume = $request->costume;
        $entity->has_hair_style = $request->get('has_hair_style', false);
        $entity->is_limited = $request->get('is_limited', false);
        $entity->is_fes = $request->get('is_fes', false);
        $entity->performance = $request->get('performance', 0);
        $entity->technique = $request->get('technique', 0);
        $entity->stamina = $request->get('stamina', 0);
        $entity->normal_file = empty($request->normal_file_path) ? null : $request->normal_file_path;
        $entity->after_training_file = empty($request->after_training_file_path) ? null : $request->after_training_file_path;

        return $entity->save();
    }

    public function update(Card $entity, CardUpdate $request): bool
    {
        $entity->released_at = $request->released_at;
        $entity->rarity = $request->rarity;
        $entity->attribute = $request->attribute;
        $entity->name = $request->name;
        $entity->member_id = $request->member_id;
        $entity->skill_effect = $request->skill_effect;
        $entity->skill_name = $request->skill_name;
        $entity->costume = $request->costume;
        $entity->has_hair_style = $request->get('has_hair_style', false);
        $entity->is_limited = $request->get('is_limited', false);
        $entity->is_fes = $request->get('is_fes', false);
        $entity->performance = $request->get('performance', 0);
        $entity->technique = $request->get('technique', 0);
        $entity->stamina = $request->get('stamina', 0);
        $entity->normal_file = empty($request->normal_file_path) ? null : $request->normal_file_path;
        $entity->after_training_file = empty($request->after_training_file_path) ? null : $request->after_training_file_path;

        return $entity->save();
    }

    public function delete(Card $entity): bool
    {
        return $entity->delete();
    }
}
