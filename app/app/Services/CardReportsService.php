<?php

namespace App\Services;

use App\Enums\Attribute;
use App\Enums\Rarity;
use App\Enums\SkillEffect;
use App\Models\Card;
use App\Repositories\CardsRepository;
use App\Repositories\EventsRepository;
use App\Repositories\MembersRepository;
use App\Repositories\UnitsRepository;
use Illuminate\Support\Str;

class CardReportsService
{
    private $cardsRepository;
    private $membersRepository;

    /**
     * @param \App\Repositories\CardsRepository $cardsRepository
     * @param MembersRepository $membersRepository
     */
    public function __construct(
        CardsRepository   $cardsRepository,
        MembersRepository $membersRepository
    )
    {
        $this->cardsRepository = $cardsRepository;
        $this->membersRepository = $membersRepository;
    }

    /**
     * メンバーごとのカード枚数
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateNumberOfCardsByMember()
    {
        $cards = $this->cardsRepository->findAll([], ['released_at' => 'asc']);

        $results = [];
        foreach ($cards as $card) {
            /** @var \App\Models\Card $card */

            $memberId = $card->member_id;
            $results = $this->setCardCount($results, $memberId, $card);
        }

        $members = $this->membersRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
        ]);
        $members = $members->where('unit.is_active', '=', true);

        foreach ($members as $member) {
            /** @var \App\Models\Member|\Illuminate\Database\Eloquent\Model $member */
            $member->setAttribute(
                'report_total_count',
                empty($results[$member->id]['total']) ? 0 : $results[$member->id]['total']['count']
            );

            foreach (Rarity::getValues() as $rarity) {
                $member->setAttribute(
                    'report_' . $rarity . '_count',
                    empty($results[$member->id][$rarity]) ? 0 : $results[$member->id][$rarity]['count']
                );
                $member->setAttribute(
                    'report_' . $rarity . '_date',
                    empty($results[$member->id][$rarity]) ? null : $results[$member->id][$rarity]['date']
                );
            }

            $member->setAttribute(
                'report_regular_count',
                empty($results[$member->id]['regular']) ? 0 : $results[$member->id]['regular']['count']
            );
            $member->setAttribute(
                'report_regular_date',
                empty($results[$member->id]['regular']) ? null : $results[$member->id]['regular']['date']
            );

            $member->setAttribute(
                'report_fes_count',
                empty($results[$member->id]['fes']) ? 0 : $results[$member->id]['fes']['count']
            );
            $member->setAttribute(
                'report_fes_date',
                empty($results[$member->id]['fes']) ? null : $results[$member->id]['fes']['date']
            );

            $member->setAttribute(
                'report_limited_count',
                empty($results[$member->id]['limited']) ? 0 : $results[$member->id]['limited']['count']
            );
            $member->setAttribute(
                'report_limited_date',
                empty($results[$member->id]['limited']) ? null : $results[$member->id]['limited']['date']
            );

            $member->setAttribute(
                'report_total_limited_count',
                empty($results[$member->id]['total_limited']) ? 0 : $results[$member->id]['total_limited']['count']
            );
            $member->setAttribute(
                'report_total_limited_date',
                empty($results[$member->id]['total_limited']) ? null : $results[$member->id]['total_limited']['date']
            );

            $member->setAttribute(
                'report_hair_style_count',
                empty($results[$member->id]['hair_style']) ? 0 : $results[$member->id]['hair_style']['count']
            );
            $member->setAttribute(
                'report_hair_style_date',
                empty($results[$member->id]['hair_style']) ? null : $results[$member->id]['hair_style']['date']
            );

            $member->setAttribute(
                'report_another_cut_count',
                empty($results[$member->id]['has_another_cut']) ? 0 : $results[$member->id]['has_another_cut']['count']
            );
            $member->setAttribute(
                'report_another_cut_date',
                empty($results[$member->id]['has_another_cut']) ? null : $results[$member->id]['has_another_cut']['date']
            );

            $member->setAttribute(
                'report_avatar_accessory_count',
                empty($results[$member->id]['has_avatar_accessory']) ? 0 : $results[$member->id]['has_avatar_accessory']['count']
            );
            $member->setAttribute(
                'report_avatar_accessory_date',
                empty($results[$member->id]['has_avatar_accessory']) ? null : $results[$member->id]['has_avatar_accessory']['date']
            );
        }

        return $members;
    }

    /**
     * メンバーごとのカード枚数(バチャ)
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateNumberOfCardsByVirtualSinger()
    {
        $cards = $this->cardsRepository->findAll([], ['released_at' => 'asc']);
        $virtualSingers = ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'];

        $results = [];
        foreach ($cards as $card) {
            /** @var \App\Models\Card $card */
            if (!Str::endsWith($card->member->code, $virtualSingers)) {
                continue;
            }

            foreach ($virtualSingers as $key => $virtualSinger) {
                if (Str::endsWith($card->member->code, $virtualSinger)) {
                    $memberId = $key + 1;
                    $results = $this->setCardCount($results, $memberId, $card);
                }
            }
        }

        $members = $this->membersRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
            [
                'type' => 'whereIn',
                'column' => 'id',
                'values' => [1, 2, 3, 4, 5, 6],
            ],
        ]);

        foreach ($members as $member) {
            /** @var \App\Models\Member|\Illuminate\Database\Eloquent\Model $member */
            $member->setAttribute(
                'report_total_count',
                empty($results[$member->id]['total']) ? 0 : $results[$member->id]['total']['count']
            );

            foreach (Rarity::getValues() as $rarity) {
                $member->setAttribute(
                    'report_' . $rarity . '_count',
                    empty($results[$member->id][$rarity]) ? 0 : $results[$member->id][$rarity]['count']
                );
                $member->setAttribute(
                    'report_' . $rarity . '_date',
                    empty($results[$member->id][$rarity]) ? null : $results[$member->id][$rarity]['date']
                );
            }

            $member->setAttribute(
                'report_regular_count',
                empty($results[$member->id]['regular']) ? 0 : $results[$member->id]['regular']['count']
            );
            $member->setAttribute(
                'report_regular_date',
                empty($results[$member->id]['regular']) ? null : $results[$member->id]['regular']['date']
            );

            $member->setAttribute(
                'report_fes_count',
                empty($results[$member->id]['fes']) ? 0 : $results[$member->id]['fes']['count']
            );
            $member->setAttribute(
                'report_fes_date',
                empty($results[$member->id]['fes']) ? null : $results[$member->id]['fes']['date']
            );

            $member->setAttribute(
                'report_limited_count',
                empty($results[$member->id]['limited']) ? 0 : $results[$member->id]['limited']['count']
            );
            $member->setAttribute(
                'report_limited_date',
                empty($results[$member->id]['limited']) ? null : $results[$member->id]['limited']['date']
            );

            $member->setAttribute(
                'report_total_limited_count',
                empty($results[$member->id]['total_limited']) ? 0 : $results[$member->id]['total_limited']['count']
            );
            $member->setAttribute(
                'report_total_limited_date',
                empty($results[$member->id]['total_limited']) ? null : $results[$member->id]['total_limited']['date']
            );

            $member->setAttribute(
                'report_hair_style_count',
                empty($results[$member->id]['hair_style']) ? 0 : $results[$member->id]['hair_style']['count']
            );
            $member->setAttribute(
                'report_hair_style_date',
                empty($results[$member->id]['hair_style']) ? null : $results[$member->id]['hair_style']['date']
            );

            $member->setAttribute(
                'report_another_cut_count',
                empty($results[$member->id]['has_another_cut']) ? 0 : $results[$member->id]['has_another_cut']['count']
            );
            $member->setAttribute(
                'report_another_cut_date',
                empty($results[$member->id]['has_another_cut']) ? null : $results[$member->id]['has_another_cut']['date']
            );

            $member->setAttribute(
                'report_avatar_accessory_count',
                empty($results[$member->id]['has_avatar_accessory']) ? 0 : $results[$member->id]['has_avatar_accessory']['count']
            );
            $member->setAttribute(
                'report_avatar_accessory_date',
                empty($results[$member->id]['has_avatar_accessory']) ? null : $results[$member->id]['has_avatar_accessory']['date']
            );
        }

        return $members;
    }

    /**
     * @param array $results
     * @param int $id
     * @param Card $card
     * @return array
     */
    private function setCardCount(array $results, int $id, Card $card): array
    {
        if (!isset($results[$id]['total']['count'])) {
            $results[$id]['total']['count'] = 0;
        }
        $results[$id]['total']['count']++;

        // レアリティ毎
        if (!isset($results[$id][$card->rarity->value]['count'])) {
            $results[$id][$card->rarity->value]['count'] = 0;
        }
        $results[$id][$card->rarity->value]['count']++;
        $results[$id][$card->rarity->value]['date'] = $card->released_at;

        // 恒常星4
        if ($card->rarity->value === Rarity::STAR_FOUR && !$card->is_limited) {
            if (!isset($results[$id]['regular']['count'])) {
                $results[$id]['regular']['count'] = 0;
            }
            $results[$id]['regular']['count']++;
            $results[$id]['regular']['date'] = $card->released_at;
        }

        // フェス限
        if ($card->is_fes) {
            if (!isset($results[$id]['fes']['count'])) {
                $results[$id]['fes']['count'] = 0;
            }
            $results[$id]['fes']['count']++;
            $results[$id]['fes']['date'] = $card->released_at;
        }

        // 星4通常限(サンリオが星2限定
        if ($card->rarity->value === Rarity::STAR_FOUR && $card->is_limited && !$card->is_fes) {
            if (!isset($results[$id]['limited']['count'])) {
                $results[$id]['limited']['count'] = 0;
            }
            $results[$id]['limited']['count']++;
            $results[$id]['limited']['date'] = $card->released_at;
        }

        // 星4限定合計(サンリオが星2限定
        if ($card->rarity->value === Rarity::STAR_FOUR && $card->is_limited) {
            if (!isset($results[$id]['total_limited']['count'])) {
                $results[$id]['total_limited']['count'] = 0;
            }
            $results[$id]['total_limited']['count']++;
            $results[$id]['total_limited']['date'] = $card->released_at;
        }

        // 髪型あり
        if ($card->is_limited && $card->has_hair_style) {
            if (!isset($results[$id]['hair_style']['count'])) {
                $results[$id]['hair_style']['count'] = 0;
            }
            $results[$id]['hair_style']['count']++;
            $results[$id]['hair_style']['date'] = $card->released_at;
        }

        // アナザーカットあり
        if ($card->is_limited && $card->has_another_cut) {
            if (!isset($results[$id]['has_another_cut']['count'])) {
                $results[$id]['has_another_cut']['count'] = 0;
            }
            $results[$id]['has_another_cut']['count']++;
            $results[$id]['has_another_cut']['date'] = $card->released_at;
        }

        // 豆腐あり
        if ($card->is_limited && $card->has_avatar_accessory) {
            if (!isset($results[$id]['has_avatar_accessory']['count'])) {
                $results[$id]['has_avatar_accessory']['count'] = 0;
            }
            $results[$id]['has_avatar_accessory']['count']++;
            $results[$id]['has_avatar_accessory']['date'] = $card->released_at;
        }

        return $results;
    }

    /**
     * メンバーごとのカード属性
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateCardAttributesByMember()
    {
        $cards = $this->cardsRepository->findAll([], ['released_at' => 'asc']);

        $results = [];
        foreach ($cards as $card) {
            /** @var \App\Models\Card $card */

            $memberId = $card->member_id;
            $results = $this->setCardAttribute($results, $memberId, $card);
        }

        $members = $this->membersRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
        ]);
        $members = $members->where('unit.is_active', '=', true);

        foreach ($members as $member) {
            /** @var \App\Models\Member|\Illuminate\Database\Eloquent\Model $member */

            foreach (Rarity::getValues() as $rarity) {
                foreach (Attribute::getValues() as $attribute) {
                    $member->setAttribute(
                        'report_' . $rarity . '_' . $attribute . '_count',
                        empty($results[$member->id][$rarity][$attribute]) ? 0 : $results[$member->id][$rarity][$attribute]
                    );
                }
            }
        }

        return $members;
    }

    /**
     * メンバーごとのカード属性(バチャ)
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateCardAttributesByVirtualSinger()
    {
        $cards = $this->cardsRepository->findAll([], ['released_at' => 'asc']);
        $virtualSingers = ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'];

        $results = [];
        foreach ($cards as $card) {
            /** @var \App\Models\Card $card */
            if (!Str::endsWith($card->member->code, $virtualSingers)) {
                continue;
            }

            foreach ($virtualSingers as $key => $virtualSinger) {
                if (Str::endsWith($card->member->code, $virtualSinger)) {
                    $memberId = $key + 1;
                    $results = $this->setCardAttribute($results, $memberId, $card);
                }
            }
        }

        $members = $this->membersRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
            [
                'type' => 'whereIn',
                'column' => 'id',
                'values' => [1, 2, 3, 4, 5, 6],
            ],
        ]);

        foreach ($members as $member) {
            /** @var \App\Models\Member|\Illuminate\Database\Eloquent\Model $member */
            foreach (Rarity::getValues() as $rarity) {
                foreach (Attribute::getValues() as $attribute) {
                    $member->setAttribute(
                        'report_' . $rarity . '_' . $attribute . '_count',
                        empty($results[$member->id][$rarity][$attribute]) ? 0 : $results[$member->id][$rarity][$attribute]
                    );
                }
            }
        }

        return $members;
    }

    /**
     * @param array $results
     * @param int $id
     * @param Card $card
     * @return array
     */
    private function setCardAttribute(array $results, int $id, Card $card): array
    {
        if (!isset($results[$id][$card->rarity->value][$card->attribute->value])) {
            $results[$id][$card->rarity->value][$card->attribute->value] = 0;
        }
        $results[$id][$card->rarity->value][$card->attribute->value]++;

        return $results;
    }

    /**
     * メンバーごとのカードスキル
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateCardSkillsByMember()
    {
        $cards = $this->cardsRepository->findAll([], ['released_at' => 'asc']);

        $results = [];
        foreach ($cards as $card) {
            /** @var \App\Models\Card $card */

            $memberId = $card->member_id;
            $results = $this->setCardSkill($results, $memberId, $card);
        }

        $members = $this->membersRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
        ]);
        $members = $members->where('unit.is_active', '=', true);

        foreach ($members as $member) {
            /** @var \App\Models\Member|\Illuminate\Database\Eloquent\Model $member */

            foreach (Rarity::getValues() as $rarity) {
                foreach (SkillEffect::getValues() as $skill) {
                    $member->setAttribute(
                        'report_' . $rarity . '_' . $skill . '_count',
                        empty($results[$member->id][$rarity][$skill]) ? 0 : $results[$member->id][$rarity][$skill]
                    );
                }
            }
        }

        return $members;
    }

    /**
     * メンバーごとのカードスキル(バチャ)
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateCardSkillsByVirtualSinger()
    {
        $cards = $this->cardsRepository->findAll([], ['released_at' => 'asc']);
        $virtualSingers = ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'];

        $results = [];
        foreach ($cards as $card) {
            /** @var \App\Models\Card $card */
            if (!Str::endsWith($card->member->code, $virtualSingers)) {
                continue;
            }

            foreach ($virtualSingers as $key => $virtualSinger) {
                if (Str::endsWith($card->member->code, $virtualSinger)) {
                    $memberId = $key + 1;
                    $results = $this->setCardSkill($results, $memberId, $card);
                }
            }
        }

        $members = $this->membersRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
            [
                'type' => 'whereIn',
                'column' => 'id',
                'values' => [1, 2, 3, 4, 5, 6],
            ],
        ]);

        foreach ($members as $member) {
            /** @var \App\Models\Member|\Illuminate\Database\Eloquent\Model $member */
            foreach (Rarity::getValues() as $rarity) {
                foreach (SkillEffect::getValues() as $skill) {
                    $member->setAttribute(
                        'report_' . $rarity . '_' . $skill . '_count',
                        empty($results[$member->id][$rarity][$skill]) ? 0 : $results[$member->id][$rarity][$skill]
                    );
                }
            }
        }

        return $members;
    }

    /**
     * @param array $results
     * @param int $id
     * @param Card $card
     * @return array
     */
    private function setCardSkill(array $results, int $id, Card $card): array
    {
        if (!isset($results[$id][$card->rarity->value][$card->skill_effect->value])) {
            $results[$id][$card->rarity->value][$card->skill_effect->value] = 0;
        }
        $results[$id][$card->rarity->value][$card->skill_effect->value]++;

        return $results;
    }
}
