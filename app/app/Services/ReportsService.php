<?php

namespace App\Services;

use App\Enums\Rarity;
use App\Repositories\CardsRepository;
use App\Repositories\EventsRepository;
use Illuminate\Support\Str;

class ReportsService
{
    private $eventsRepository;
    private $cardsRepository;

    /**
     * @param \App\Repositories\EventsRepository $eventsRepository
     * @param \App\Repositories\CardsRepository $cardsRepository
     */
    public function __construct(EventsRepository $eventsRepository, CardsRepository $cardsRepository)
    {
        $this->eventsRepository = $eventsRepository;
        $this->cardsRepository = $cardsRepository;
    }

    /**
     * @return array
     */
    public function eventAggregationByMembers(): array
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $members = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }
            if ($event->unit_count === 1) {
                // 箱イベ
                $members[$event->bannerCard->card->member_id]['unit']['date'] = $event->starts_at;
                if (!isset($members[$event->bannerCard->card->member_id]['unit']['count'])) {
                    $members[$event->bannerCard->card->member_id]['unit']['count'] = 0;
                }
                $members[$event->bannerCard->card->member_id]['unit']['count']++;
            } elseif ($event->unit_count > 1) {
                // 混合イベ
                $members[$event->bannerCard->card->member_id]['mixed']['date'] = $event->starts_at;
                if (!isset($members[$event->bannerCard->card->member_id]['mixed']['count'])) {
                    $members[$event->bannerCard->card->member_id]['mixed']['count'] = 0;
                }
                $members[$event->bannerCard->card->member_id]['mixed']['count']++;
            }

            // 合計
            if (!isset($members[$event->bannerCard->card->member_id]['total']['count'])) {
                $members[$event->bannerCard->card->member_id]['total']['count'] = 0;
            }
            $members[$event->bannerCard->card->member_id]['total']['count']++;

            if (!empty($event->tune)) {
                $members[$event->bannerCard->card->member_id]['tunes'][] = $event->tune;

                if (!isset($members[$event->bannerCard->card->member_id]['has_2d_mv_count'])) {
                    $members[$event->bannerCard->card->member_id]['has_2d_mv_count'] = 0;
                }
                if (!isset($members[$event->bannerCard->card->member_id]['has_3d_mv_count'])) {
                    $members[$event->bannerCard->card->member_id]['has_3d_mv_count'] = 0;
                }

                if ($event->tune->has_3d_mv) {
                    $members[$event->bannerCard->card->member_id]['has_3d_mv_count']++;
                } else {
                    $members[$event->bannerCard->card->member_id]['has_2d_mv_count']++;
                }
            }
        }

        return $members;
    }

    /**
     * @return array
     */
    public function eventAggregationByUnits(): array
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $units = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            $unitId = $event->bannerCard->card->member->unit_id;
            if (Str::endsWith($event->bannerCard->card->member->code, ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'])) {
                $unitId = 1;
            }

            if ($event->unit_count === 1) {
                // 箱イベ
                $units[$unitId]['unit']['date'] = $event->starts_at;

                if (!isset($units[$unitId]['unit']['count'])) {
                    $units[$unitId]['unit']['count'] = 0;
                }
                $units[$unitId]['unit']['count']++;
            } elseif ($event->unit_count > 1) {
                // 混合イベ
                $units[$unitId]['mixed']['date'] = $event->starts_at;
                if (!isset($units[$unitId]['mixed']['count'])) {
                    $units[$unitId]['mixed']['count'] = 0;
                }
                $units[$unitId]['mixed']['count']++;
            }

            // 合計
            if (!isset($units[$unitId]['total']['count'])) {
                $units[$unitId]['total']['count'] = 0;
            }
            $units[$unitId]['total']['count']++;

            if (!empty($event->tune)) {
                $units[$unitId]['tunes'][] = $event->tune;

                if (!isset($units[$unitId]['has_2d_mv_count'])) {
                    $units[$unitId]['has_2d_mv_count'] = 0;
                }
                if (!isset($units[$unitId]['has_3d_mv_count'])) {
                    $units[$unitId]['has_3d_mv_count'] = 0;
                }

                if ($event->tune->has_3d_mv) {
                    $units[$unitId]['has_3d_mv_count']++;
                } else {
                    $units[$unitId]['has_2d_mv_count']++;
                }
            }

            // 周期
            if (!isset($turn[$unitId])) {
                $turn[$unitId] = 1;
            }
            if (!isset($turnMembers[$unitId])) {
                $turnMembers[$unitId] = 0;
                // レオニの1周目は一歌skip
                if ($unitId === 2 && $turn[$unitId] === 1) {
                    $turnMembers[$unitId] = 1;
                }
            }

            $units[$unitId]['turn'][$turn[$unitId]][] = $event;
            if ($event->unit_count === 1) {
                $turnMembers[$unitId]++;
            }
            if ($turnMembers[$unitId] === 4) {
                $turn[$unitId]++;
                $turnMembers[$unitId] = 0;
            }
        }

        return $units;
    }

    /**
     * @return array
     */
    public function cardAggregationByRarity(): array
    {
        $cards = $this->cardsRepository->findAll([], ['released_at' => 'asc']);
        $virtualSingers = ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'];

        $members = [];
        foreach ($cards as $card) {
            /** @var \App\Models\Card $card */

            if (!isset($members[$card->member_id]['total']['count'])) {
                $members[$card->member_id]['total']['count'] = 0;
            }
            $members[$card->member_id]['total']['count']++;

            // レアリティ毎
            if (!isset($members[$card->member_id][$card->rarity->value]['count'])) {
                $members[$card->member_id][$card->rarity->value]['count'] = 0;
            }
            $members[$card->member_id][$card->rarity->value]['count']++;
            $members[$card->member_id][$card->rarity->value]['date'] = $card->released_at;

            // 恒常星4
            if ($card->rarity->value === Rarity::STAR_FOUR && !$card->is_limited) {
                if (!isset($members[$card->member_id]['regular']['count'])) {
                    $members[$card->member_id]['regular']['count'] = 0;
                }
                $members[$card->member_id]['regular']['count']++;
                $members[$card->member_id]['regular']['date'] = $card->released_at;
            }

            // フェス限
            if ($card->is_fes) {
                if (!isset($members[$card->member_id]['fes']['count'])) {
                    $members[$card->member_id]['fes']['count'] = 0;
                }
                $members[$card->member_id]['fes']['count']++;
                $members[$card->member_id]['fes']['date'] = $card->released_at;
            }

            // 通常限
            if ($card->is_limited && !$card->is_fes) {
                if (!isset($members[$card->member_id]['limited']['count'])) {
                    $members[$card->member_id]['limited']['count'] = 0;
                }
                $members[$card->member_id]['limited']['count']++;
                $members[$card->member_id]['limited']['date'] = $card->released_at;
            }

            // 限定合計
            if ($card->is_limited) {
                if (!isset($members[$card->member_id]['hair_style']['count'])) {
                    $members[$card->member_id]['hair_style']['count'] = 0;
                }
                $members[$card->member_id]['hair_style']['count']++;
            }

            // バチャはまとめる
            foreach ($virtualSingers as $key => $virtualSinger) {
                if (Str::endsWith($card->member->code, $virtualSinger)) {
                    // 合計
                    if (!isset($members['vs'][$key]['total']['count'])) {
                        $members['vs'][$key]['total']['count'] = 0;
                    }
                    $members['vs'][$key]['total']['count']++;

                    // レアリティ毎
                    if (!isset($members['vs'][$key][$card->rarity->value]['count'])) {
                        $members['vs'][$key][$card->rarity->value]['count'] = 0;
                    }
                    $members['vs'][$key][$card->rarity->value]['count']++;

                    // 恒常星4
                    if ($card->rarity->value === Rarity::STAR_FOUR && !$card->is_limited) {
                        if (!isset($members['vs'][$key]['regular']['count'])) {
                            $members['vs'][$key]['regular']['count'] = 0;
                        }
                        $members['vs'][$key]['regular']['count']++;
                    }

                    // フェス限
                    if ($card->is_fes) {
                        if (!isset($members['vs'][$key]['fes']['count'])) {
                            $members['vs'][$key]['fes']['count'] = 0;
                        }
                        $members['vs'][$key]['fes']['count']++;
                    }

                    // 通常限
                    if ($card->is_limited && !$card->is_fes) {
                        if (!isset($members['vs'][$key]['limited']['count'])) {
                            $members['vs'][$key]['limited']['count'] = 0;
                        }
                        $members['vs'][$key]['limited']['count']++;
                    }

                    // 限定合計
                    if ($card->is_limited) {
                        if (!isset($members['vs'][$key]['hair_style']['count'])) {
                            $members['vs'][$key]['hair_style']['count'] = 0;
                        }
                        $members['vs'][$key]['hair_style']['count']++;
                    }
                }
            }
        }

        $members['vs'] = collect($members['vs']);

        return $members;
    }

    /**
     * @return array
     */
    public function cardAggregationByAttribute(): array
    {
        $cards = $this->cardsRepository->findAll([], ['released_at' => 'asc']);
        $virtualSingers = ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'];

        $members = [];
        foreach ($cards as $card) {
            /** @var \App\Models\Card $card */

            if (!isset($members[$card->member_id][$card->rarity->value][$card->attribute->value])) {
                $members[$card->member_id][$card->rarity->value][$card->attribute->value] = 0;
            }
            $members[$card->member_id][$card->rarity->value][$card->attribute->value]++;

            // バチャはまとめる
            foreach ($virtualSingers as $key => $virtualSinger) {
                if (Str::endsWith($card->member->code, $virtualSinger)) {
                    if (!isset($members['vs'][$key][$card->rarity->value][$card->attribute->value])) {
                        $members['vs'][$key][$card->rarity->value][$card->attribute->value] = 0;
                    }
                    $members['vs'][$key][$card->rarity->value][$card->attribute->value]++;
                }
            }
        }

        $members['vs'] = collect($members['vs']);

        return $members;
    }

}
