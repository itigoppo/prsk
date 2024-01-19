<?php

namespace App\Http\Controllers\Front;

use App\Enums\Attribute;
use App\Enums\Rarity;
use App\Enums\SkillEffect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MembersController extends Controller
{
    public function lookupCards(string $id, Request $request)
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $attribute = $request->query('attribute');
        if (empty($attribute)) {
            abort(404);
        }

        $member = $membersService->findOne($id);
        if (empty($member)) {
            abort(404);
        }

        return view('front.members.lookup.cards', [
            'label' => $this->getAttributes($attribute)['label'],
            'cards' => $member->getAttribute($attribute),
        ]);
    }

    public function lookupVirtualSingerCards(string $id, Request $request)
    {
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');

        $attribute = $request->query('attribute');
        if (empty($attribute)) {
            abort(404);
        }

        /** @var \App\Models\Member $member */
        $member = $reportsService->aggregateHistoriesByVirtualSinger()->firstWhere('uuid', $id);
        if (empty($member)) {
            abort(404);
        }

        /** @var Collection $cards */
        $cards = $member->getAttribute('cards');

        return view('front.members.lookup.cards', [
            'label' => $this->getAttributes($attribute)['label'],
            'cards' => $cards->get($this->getAttributes($attribute)['reportKey']) ?? collect([]),
        ]);
    }

    private function getAttributes($attribute): array
    {
        $label = '';
        $reportKey = '';
        switch ($attribute) {
            case 'has_cards_with_one_star_rarity':
                $label = Rarity::getDescription(Rarity::STAR_ONE);
                $reportKey = Rarity::STAR_ONE;
                break;
            case 'has_cards_with_two_star_rarity':
                $label = Rarity::getDescription(Rarity::STAR_TWO);
                $reportKey = Rarity::STAR_TWO;
                break;
            case 'has_cards_with_three_star_rarity':
                $label = Rarity::getDescription(Rarity::STAR_THREE);
                $reportKey = Rarity::STAR_THREE;
                break;
            case 'has_cards_with_four_star_rarity':
                $label = Rarity::getDescription(Rarity::STAR_FOUR);
                $reportKey = Rarity::STAR_FOUR;
                break;
            case 'has_cards_with_birthday_rarity':
                $label = Rarity::getDescription(Rarity::BIRTHDAY);
                $reportKey = Rarity::BIRTHDAY;
                break;
            case 'has_cards_with_regular_for_star_four_rarity':
                $label = '恒常星4';
                $reportKey = 'regular';
                break;
            case 'has_cards_with_limited_for_star_four_rarity':
                $label = '限定星4+フェス限';
                $reportKey = 'total_limited';
                break;
            case 'has_cards_with_regular_limited_for_star_four_rarity':
                $label = '限定星4';
                $reportKey = 'limited';
                break;
            case 'has_cards_with_fes_for_star_four_rarity':
                $label = 'フェス限';
                $reportKey = 'fes';
                break;
            case 'has_cards_with_hair_style':
                $label = '限定(髪型あり)';
                $reportKey = 'has_hair_style';
                break;
            case 'has_cards_with_another_cut':
                $label = '限定(アナザーカットあり)';
                $reportKey = 'has_another_cut';
                break;
            case 'has_cards_with_avatar_accessory':
                $label = '限定(アバターアクセサリーあり)';
                $reportKey = 'has_avatar_accessory';
                break;
            case 'has_cards_with_special_score_skill_for_star_four_rarity':
                $label = '星4(' . SkillEffect::getDescription(SkillEffect::SPECIAL_SCORE) . ')';
                $reportKey = 'four_star_' . SkillEffect::SPECIAL_SCORE;
                break;
            case 'has_cards_with_unit_score_boost_skill_for_star_four_rarity':
                $label = '星4(' . SkillEffect::getDescription(SkillEffect::UNIT_SCORE_BOOST) . ')';
                $reportKey = 'four_star_' . SkillEffect::UNIT_SCORE_BOOST;
                break;
            case 'has_cards_with_depend_of_accuracy_skill_for_star_four_rarity':
                $label = '星4(' . SkillEffect::getDescription(SkillEffect::DEPENDS_ON_ACCURACY) . ')';
                $reportKey = 'four_star_' . SkillEffect::DEPENDS_ON_ACCURACY;
                break;
            case 'has_cards_with_depend_of_life_skill_for_star_four_rarity':
                $label = '星4(' . SkillEffect::getDescription(SkillEffect::DEPENDS_ON_LIFE) . ')';
                $reportKey = 'four_star_' . SkillEffect::DEPENDS_ON_LIFE;
                break;
            case 'has_cards_with_score_boost_skill_for_star_four_rarity':
                $label = '星4(' . SkillEffect::getDescription(SkillEffect::SCORE_BOOST) . ')';
                $reportKey = 'four_star_' . SkillEffect::SCORE_BOOST;
                break;
            case 'has_cards_with_life_recover_skill_for_star_four_rarity':
                $label = '星4(' . SkillEffect::getDescription(SkillEffect::LIFE_RECOVER) . ')';
                $reportKey = 'four_star_' . SkillEffect::LIFE_RECOVER;
                break;
            case 'has_cards_with_judgment_skill_for_star_four_rarity':
                $label = '星4(' . SkillEffect::getDescription(SkillEffect::JUDGMENT) . ')';
                $reportKey = 'four_star_' . SkillEffect::JUDGMENT;
                break;
            case 'has_cards_with_attribute_cute_for_star_four_rarity':
                $label = '星4(' . Attribute::getDescription(Attribute::CUTE) . ')';
                $reportKey = 'four_star_' . Attribute::CUTE;
                break;
            case 'has_cards_with_attribute_cool_for_star_four_rarity':
                $label = '星4(' . Attribute::getDescription(Attribute::COOL) . ')';
                $reportKey = 'four_star_' . Attribute::COOL;
                break;
            case 'has_cards_with_attribute_pure_for_star_four_rarity':
                $label = '星4(' . Attribute::getDescription(Attribute::PURE) . ')';
                $reportKey = 'four_star_' . Attribute::PURE;
                break;
            case 'has_cards_with_attribute_happy_for_star_four_rarity':
                $label = '星4(' . Attribute::getDescription(Attribute::HAPPY) . ')';
                $reportKey = 'four_star_' . Attribute::HAPPY;
                break;
            case 'has_cards_with_attribute_mysterious_for_star_four_rarity':
                $label = '星4(' . Attribute::getDescription(Attribute::MYSTERIOUS) . ')';
                $reportKey = 'four_star_' . Attribute::MYSTERIOUS;
                break;
        }

        return [
            'label' => $label,
            'reportKey' => $reportKey,
        ];
    }
}
