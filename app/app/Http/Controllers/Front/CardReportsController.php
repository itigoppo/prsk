<?php

namespace App\Http\Controllers\Front;

use App\Enums\Attribute;
use App\Enums\Rarity;
use App\Enums\SkillEffect;
use App\Http\Controllers\Controller;

class CardReportsController extends Controller
{
    public function count()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateNumberOfCardsByMember();
        $virtualSingers = $reportsService->aggregateNumberOfCardsByVirtualSinger();

        return view('front.reports.cards.count', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }

    public function released()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateNumberOfCardsByMember();

        return view('front.reports.cards.released', [
            'card' => $card,
            'members' => $members,
        ]);
    }

    public function attributes()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateCardAttributesByMember();
        $virtualSingers = $reportsService->aggregateCardAttributesByVirtualSinger();

        return view('front.reports.cards.attributes', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }

    public function skills()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');

        $card = $cardsService->findAll()->first();
        $members = $reportsService->aggregateCardSkillsByMember();
        $virtualSingers = $reportsService->aggregateCardSkillsByVirtualSinger();

        return view('front.reports.cards.skills', [
            'card' => $card,
            'members' => $members,
            'virtualSingers' => $virtualSingers,
        ]);
    }

    public function separate()
    {
        /** @var \App\Services\CardReportsService $reportsService */
        $reportsService = app()->make('CardReportsService');
        /** @var \App\Services\CardsService $cardsService */
        $cardsService = app()->make('CardsService');
        /** @var \App\Services\MembersService $membersService */
        $membersService = app()->make('MembersService');

        $card = $cardsService->findAll()->first();
        $members = $membersService->findAll([
            'is_active' => true,
        ]);
        $members = $members->where('unit.is_active', '=', true);

        $virtualSingers = $reportsService->virtualSingers();

        $rarityPatterns = [];
        foreach (Rarity::getValues() as $value) {
            switch ($value) {
                case Rarity::STAR_ONE():
                    $attribute = 'has_cards_with_one_star_rarity';
                    break;
                case Rarity::STAR_TWO():
                    $attribute = 'has_cards_with_two_star_rarity';
                    break;
                case Rarity::STAR_THREE():
                    $attribute = 'has_cards_with_three_star_rarity';
                    break;
                case Rarity::STAR_FOUR():
                    $attribute = 'has_cards_with_four_star_rarity';
                    break;
                case Rarity::BIRTHDAY():
                    $attribute = 'has_cards_with_birthday_rarity';
                    break;
                default:
                    $attribute = '';
                    break;
            }
            $rarityPatterns[] = [
                'label' => Rarity::getDescription($value),
                'attribute' => $attribute,
            ];
        }

        $rarityStarFourPatterns = [
            [
                'label' => '恒常',
                'attribute' => 'has_cards_with_regular_for_star_four_rarity',
            ],
            [
                'label' => '限定+フェス限',
                'attribute' => 'has_cards_with_limited_for_star_four_rarity',
            ],
            [
                'label' => '限定',
                'attribute' => 'has_cards_with_regular_limited_for_star_four_rarity',
            ],
            [
                'label' => 'フェス限',
                'attribute' => 'has_cards_with_fes_for_star_four_rarity',
            ],
        ];

        $skillForRarityStarFourPatterns = [];
        foreach (SkillEffect::getValues() as $value) {
            switch ($value) {
                case SkillEffect::SPECIAL_SCORE():
                    $attribute = 'has_cards_with_special_score_skill_for_star_four_rarity';
                    break;
                case SkillEffect::UNIT_SCORE_BOOST():
                    $attribute = 'has_cards_with_unit_score_boost_skill_for_star_four_rarity';
                    break;
                case SkillEffect::DEPENDS_ON_ACCURACY():
                    $attribute = 'has_cards_with_depend_of_accuracy_skill_for_star_four_rarity';
                    break;
                case SkillEffect::DEPENDS_ON_LIFE():
                    $attribute = 'has_cards_with_depend_of_life_skill_for_star_four_rarity';
                    break;
                case SkillEffect::SCORE_BOOST():
                    $attribute = 'has_cards_with_score_boost_skill_for_star_four_rarity';
                    break;
                case SkillEffect::LIFE_RECOVER():
                    $attribute = 'has_cards_with_life_recover_skill_for_star_four_rarity';
                    break;
                case SkillEffect::JUDGMENT():
                    $attribute = 'has_cards_with_judgment_skill_for_star_four_rarity';
                    break;
                default:
                    $attribute = '';
                    break;
            }
            if ($attribute) {
                $skillForRarityStarFourPatterns[] = [
                    'label' => SkillEffect::getDescription($value),
                    'attribute' => $attribute,
                ];
            }
        }

        $attributeForRarityStarFourPatterns = [];
        foreach (Attribute::getValues() as $value) {
            switch ($value) {
                case Attribute::CUTE():
                    $attribute = 'has_cards_with_attribute_cute_for_star_four_rarity';
                    break;
                case Attribute::COOL():
                    $attribute = 'has_cards_with_attribute_cool_for_star_four_rarity';
                    break;
                case Attribute::PURE():
                    $attribute = 'has_cards_with_attribute_pure_for_star_four_rarity';
                    break;
                case Attribute::HAPPY():
                    $attribute = 'has_cards_with_attribute_happy_for_star_four_rarity';
                    break;
                case Attribute::MYSTERIOUS():
                    $attribute = 'has_cards_with_attribute_mysterious_for_star_four_rarity';
                    break;
                default:
                    $attribute = '';
                    break;
            }
            if ($attribute) {
                $attributeForRarityStarFourPatterns[] = [
                    'label' => Attribute::getDescription($value),
                    'attribute' => $attribute,
                ];
            }
        }

        $limitedPatterns = [
            [
                'label' => '髪型あり',
                'attribute' => 'has_cards_with_hair_style',
            ],
            [
                'label' => 'アナザーカットあり',
                'attribute' => 'has_cards_with_another_cut',
            ],
            [
                'label' => 'アバターアクセサリーあり',
                'attribute' => 'has_cards_with_avatar_accessory',
            ],
        ];

        return view('front.reports.cards.separate', [
            'card' => $card,
            'virtualSingers' => $virtualSingers,
            'members' => $members,
            'labels' => [
                [
                    'label' => 'レアリティ別',
                    'patterns' => $rarityPatterns,
                ],
                [
                    'label' => '星4内訳',
                    'patterns' => $rarityStarFourPatterns,
                ],
                [
                    'label' => '限定星4内訳',
                    'patterns' => $limitedPatterns,
                ],
                [
                    'label' => '星4スキル別',
                    'patterns' => $skillForRarityStarFourPatterns,
                ],
                [
                    'label' => '星4タイプ別',
                    'patterns' => $attributeForRarityStarFourPatterns,
                ],
            ],
        ]);
    }
}
