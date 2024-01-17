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

class EventReportsService
{
    private $eventsRepository;
    private $unitsRepository;
    private $membersRepository;

    /**
     * @param \App\Repositories\EventsRepository $eventsRepository
     * @param UnitsRepository $unitsRepository
     * @param MembersRepository $membersRepository
     */
    public function __construct(
        EventsRepository  $eventsRepository,
        UnitsRepository   $unitsRepository,
        MembersRepository $membersRepository
    )
    {
        $this->eventsRepository = $eventsRepository;
        $this->unitsRepository = $unitsRepository;
        $this->membersRepository = $membersRepository;
    }

    /**
     * ユニットごとのイベント回数
     *
     * @return \App\Models\Unit[]|UnitsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateTheNumberOfEventsByUnit()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
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
                $results[$unitId]['unit']['date'] = $event->starts_at;

                if (!isset($results[$unitId]['unit']['count'])) {
                    $results[$unitId]['unit']['count'] = 0;
                }
                $results[$unitId]['unit']['count']++;
            } elseif ($event->unit_count > 1) {
                // 混合イベ
                $results[$unitId]['mixed']['date'] = $event->starts_at;
                if (!isset($results[$unitId]['mixed']['count'])) {
                    $results[$unitId]['mixed']['count'] = 0;
                }
                $results[$unitId]['mixed']['count']++;
            }

            // 合計
            if (!isset($results[$unitId]['total']['count'])) {
                $results[$unitId]['total']['count'] = 0;
            }
            $results[$unitId]['total']['count']++;
        }

        $units = $this->unitsRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
        ]);

        foreach ($units as $unit) {
            /** @var \App\Models\Unit|\Illuminate\Database\Eloquent\Model $unit */
            $unit->setAttribute(
                'report_unit_count',
                empty($results[$unit->id]['unit']) ? 0 : $results[$unit->id]['unit']['count']
            );
            $unit->setAttribute(
                'report_unit_date',
                empty($results[$unit->id]['unit']) ? null : $results[$unit->id]['unit']['date']
            );
            $unit->setAttribute(
                'report_mixed_count',
                empty($results[$unit->id]['mixed']) ? 0 : $results[$unit->id]['mixed']['count']
            );
            $unit->setAttribute(
                'report_mixed_date',
                empty($results[$unit->id]['mixed']) ? null : $results[$unit->id]['mixed']['date']
            );
            $unit->setAttribute(
                'report_total_count',
                empty($results[$unit->id]['total']) ? 0 : $results[$unit->id]['total']['count']
            );
        }

        return $units;
    }

    /**
     * メンバーごとのイベント回数
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateTheNumberOfEventsByMember()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            $memberId = $event->bannerCard->card->member_id;

            if ($event->unit_count === 1) {
                // 箱イベ
                $results[$memberId]['unit']['date'] = $event->starts_at;

                if (!isset($results[$memberId]['unit']['count'])) {
                    $results[$memberId]['unit']['count'] = 0;
                }
                $results[$memberId]['unit']['count']++;
            } elseif ($event->unit_count > 1) {
                // 混合イベ
                $results[$memberId]['mixed']['date'] = $event->starts_at;
                if (!isset($results[$memberId]['mixed']['count'])) {
                    $results[$memberId]['mixed']['count'] = 0;
                }
                $results[$memberId]['mixed']['count']++;
            }

            // 合計
            if (!isset($results[$memberId]['total']['count'])) {
                $results[$memberId]['total']['count'] = 0;
            }
            $results[$memberId]['total']['count']++;
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
                'report_unit_count',
                empty($results[$member->id]['unit']) ? 0 : $results[$member->id]['unit']['count']
            );
            $member->setAttribute(
                'report_unit_date',
                empty($results[$member->id]['unit']) ? null : $results[$member->id]['unit']['date']
            );
            $member->setAttribute(
                'report_mixed_count',
                empty($results[$member->id]['mixed']) ? 0 : $results[$member->id]['mixed']['count']
            );
            $member->setAttribute(
                'report_mixed_date',
                empty($results[$member->id]['mixed']) ? null : $results[$member->id]['mixed']['date']
            );
            $member->setAttribute(
                'report_total_count',
                empty($results[$member->id]['total']) ? 0 : $results[$member->id]['total']['count']
            );
        }

        return $members;
    }

    /**
     * イベントサイクル
     *
     * @return array
     */
    public function aggregateEventCycles(): array
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        $cycle = 1;
        $units = [];
        $attributes = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            $unitId = $event->bannerCard->card->member->unit_id;
            if (Str::endsWith($event->bannerCard->card->member->code, ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'])) {
                $unitId = 1;
            }

            $results[$cycle]['events'][] = $event;
            if ($event->unit_count === 1) {
                // 箱イベ
                $units[] = $unitId;
                $units = array_values(array_unique($units));
                $attributes[] = $event->attribute->value;

                if (count($units) === 5) {
                    // 重複属性
                    $duplicated = array_keys(array_filter(array_count_values($attributes), function ($v) {
                        return ($v-1 !== 0);
                    }));
                    $results[$cycle]['duplicate_attributes'] = [];
                    if (!empty($duplicated)) {
                        $results[$cycle]['duplicate_attributes'] = $duplicated;
                    }

                    // 不足属性
                    $results[$cycle]['shortage_attributes'] = [];
                    foreach (Attribute::getValues() as $attribute) {
                        if (in_array($attribute, $attributes)) {
                            continue;
                        }
                        $results[$cycle]['shortage_attributes'][] = $attribute;
                    }

                    // 初期化＆サイクルカウント
                    $units = [];
                    $attributes = [];
                    $cycle++;
                }
            }
        }

        return $results;
    }

    /**
     * ユニットごとのイベントサイクル
     *
     * @return \App\Models\Unit[]|UnitsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateEventCyclesByUnit()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            $unitId = $event->bannerCard->card->member->unit_id;
            if (Str::endsWith($event->bannerCard->card->member->code, ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'])) {
                $unitId = 1;
            }

            if (!isset($cycle[$unitId])) {
                $cycle[$unitId] = 1;
            }
            if (!isset($members[$unitId])) {
                $members[$unitId] = [];
            }

            $results[$unitId][$cycle[$unitId]][] = $event;

            if ($event->unit_count === 1) {
                // 箱イベ
                $members[$unitId][] = $event->bannerCard->card->member_id;
                $members[$unitId] = array_values(array_unique($members[$unitId]));

                if (($unitId !== 1 && count($members[$unitId]) === 4) || ($unitId === 1 && count($members[$unitId]) === 6)) {
                    $members[$unitId] = [];
                    $cycle[$unitId]++;
                }
            }
        }

        $units = $this->unitsRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
        ]);

        foreach ($units as $unit) {
            /** @var \App\Models\Unit|\Illuminate\Database\Eloquent\Model $unit */
            $unit->setAttribute(
                'report_events',
                empty($results[$unit->id]) ? null : $results[$unit->id]
            );
        }

        return $units;
    }

    /**
     * イベント属性
     *
     * @return array
     */
    public function aggregateEventAttributes(): array
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            if ($event->unit_count === 1) {
                // 箱イベ
                if (!isset($results[$event->attribute->value]['unit'])) {
                    $results[$event->attribute->value]['unit'] = 0;
                }
                $results[$event->attribute->value]['unit']++;
            } elseif ($event->unit_count > 1) {
                // 混合イベ
                if (!isset($results[$event->attribute->value]['mixed'])) {
                    $results[$event->attribute->value]['mixed'] = 0;
                }
                $results[$event->attribute->value]['mixed']++;
            }
            // 合計
            if (!isset($results[$event->attribute->value]['total'])) {
                $results[$event->attribute->value]['total'] = 0;
            }
            $results[$event->attribute->value]['total']++;
        }

        return $results;
    }

    /**
     * ユニットごとのイベント属性
     *
     * @return \App\Models\Unit[]|UnitsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateEventAttributesByUnit()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            $unitId = $event->bannerCard->card->member->unit_id;
            if (Str::endsWith($event->bannerCard->card->member->code, ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'])) {
                $unitId = 1;
            }

            $results[$unitId]['events'][] = $event;

            if ($event->unit_count === 1) {
                // 箱イベ
                if (!isset($results[$unitId]['attributes'][$event->attribute->value]['unit'])) {
                    $results[$unitId]['attributes'][$event->attribute->value]['unit'] = 0;
                }
                $results[$unitId]['attributes'][$event->attribute->value]['unit']++;
            } elseif ($event->unit_count > 1) {
                // 混合イベ
                if (!isset($results[$unitId]['attributes'][$event->attribute->value]['mixed'])) {
                    $results[$unitId]['attributes'][$event->attribute->value]['mixed'] = 0;
                }
                $results[$unitId]['attributes'][$event->attribute->value]['mixed']++;
            }
            // 合計
            if (!isset($results[$unitId]['attributes'][$event->attribute->value]['total'])) {
                $results[$unitId]['attributes'][$event->attribute->value]['total'] = 0;
            }
            $results[$unitId]['attributes'][$event->attribute->value]['total']++;
        }

        $units = $this->unitsRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
        ]);

        foreach ($units as $unit) {
            /** @var \App\Models\Unit|\Illuminate\Database\Eloquent\Model $unit */
            $unit->setAttribute(
                'report_events',
                empty($results[$unit->id]['events']) ? null : $results[$unit->id]['events']
            );
            $unit->setAttribute(
                'report_attributes',
                empty($results[$unit->id]['attributes']) ? null : $results[$unit->id]['attributes']
            );
        }

        return $units;
    }

    /**
     * メンバーごとのイベント属性
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateEventAttributesByMember()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            $memberId = $event->bannerCard->card->member_id;

            $results[$memberId]['events'][] = $event;

            if ($event->unit_count === 1) {
                // 箱イベ
                if (!isset($results[$memberId]['attributes'][$event->attribute->value]['unit'])) {
                    $results[$memberId]['attributes'][$event->attribute->value]['unit'] = 0;
                }
                $results[$memberId]['attributes'][$event->attribute->value]['unit']++;
            } elseif ($event->unit_count > 1) {
                // 混合イベ
                if (!isset($results[$memberId]['attributes'][$event->attribute->value]['mixed'])) {
                    $results[$memberId]['attributes'][$event->attribute->value]['mixed'] = 0;
                }
                $results[$memberId]['attributes'][$event->attribute->value]['mixed']++;
            }
            // 合計
            if (!isset($results[$memberId]['attributes'][$event->attribute->value]['total'])) {
                $results[$memberId]['attributes'][$event->attribute->value]['total'] = 0;
            }
            $results[$memberId]['attributes'][$event->attribute->value]['total']++;
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
                'report_events',
                empty($results[$member->id]['events']) ? null : $results[$member->id]['events']
            );
            $member->setAttribute(
                'report_attributes',
                empty($results[$member->id]['attributes']) ? null : $results[$member->id]['attributes']
            );
        }

        return $members;
    }

    /**
     * ユニットごとのイベント楽曲
     *
     * @return \App\Models\Unit[]|UnitsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateEventTunesByUnit()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            $unitId = $event->bannerCard->card->member->unit_id;
            if (Str::endsWith($event->bannerCard->card->member->code, ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'])) {
                $unitId = 1;
            }

            if (!isset($results[$unitId]['tunes'])) {
                $results[$unitId]['tunes'] = [];
            }
            if (!isset($results[$unitId]['has_2d_mv_count'])) {
                $results[$unitId]['has_2d_mv_count'] = 0;
            }
            if (!isset($results[$unitId]['has_3d_mv_count'])) {
                $results[$unitId]['has_3d_mv_count'] = 0;
            }

            if (!empty($event->tune)) {
                $results[$unitId]['tunes'][] = $event->tune;

                if ($event->tune->has_3d_mv) {
                    $results[$unitId]['has_3d_mv_count']++;
                } else {
                    $results[$unitId]['has_2d_mv_count']++;
                }
            }
        }

        $units = $this->unitsRepository->findAll([
            [
                'type' => 'where',
                'column' => 'is_active',
                'operator' => '=',
                'value' => true,
            ],
        ]);

        foreach ($units as $unit) {
            /** @var \App\Models\Unit|\Illuminate\Database\Eloquent\Model $unit */
            $unit->setAttribute(
                'report_tunes',
                empty($results[$unit->id]['tunes']) ? null : $results[$unit->id]['tunes']
            );

            $unit->setAttribute(
                'report_has_2d_mv_count',
                empty($results[$unit->id]['has_2d_mv_count']) ? 0 : $results[$unit->id]['has_2d_mv_count']
            );

            $unit->setAttribute(
                'report_has_3d_mv_count',
                empty($results[$unit->id]['has_3d_mv_count']) ? 0 : $results[$unit->id]['has_3d_mv_count']
            );
        }

        return $units;
    }

    /**
     * メンバーごとのイベント楽曲
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateEventTunesByMember()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            $memberId = $event->bannerCard->card->member_id;

            if (!isset($results[$memberId]['tunes'])) {
                $results[$memberId]['tunes'] = [];
            }
            if (!isset($results[$memberId]['has_2d_mv_count'])) {
                $results[$memberId]['has_2d_mv_count'] = 0;
            }
            if (!isset($results[$memberId]['has_3d_mv_count'])) {
                $results[$memberId]['has_3d_mv_count'] = 0;
            }

            if (!empty($event->tune)) {
                $results[$memberId]['tunes'][] = $event->tune;

                if ($event->tune->has_3d_mv) {
                    $results[$memberId]['has_3d_mv_count']++;
                } else {
                    $results[$memberId]['has_2d_mv_count']++;
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
        ]);
        $members = $members->where('unit.is_active', '=', true);

        foreach ($members as $member) {
            /** @var \App\Models\Member|\Illuminate\Database\Eloquent\Model $member */
            $member->setAttribute(
                'report_tunes',
                empty($results[$member->id]['tunes']) ? null : $results[$member->id]['tunes']
            );

            $member->setAttribute(
                'report_has_2d_mv_count',
                empty($results[$member->id]['has_2d_mv_count']) ? 0 : $results[$member->id]['has_2d_mv_count']
            );

            $member->setAttribute(
                'report_has_3d_mv_count',
                empty($results[$member->id]['has_3d_mv_count']) ? 0 : $results[$member->id]['has_3d_mv_count']
            );
        }

        return $members;
    }

    /**
     * メンバーごとのイベント楽曲(バチャ)
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateEventTunesByVirtualSinger()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);
        $virtualSingers = ['miku', 'rin', 'len', 'luka', 'meiko', 'kaito'];

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            if (empty($event->tune)) {
                continue;
            }

            if (empty($event->tune->singers_by_type['sekai-1'])) {
                continue;
            }

            foreach ($event->tune->singers_by_type['sekai-1'] as $singer) {
                /** @var \App\Models\Singer $singer */

                if (!Str::endsWith($singer->member->code, $virtualSingers)) {
                    continue;
                }

                foreach ($virtualSingers as $key => $virtualSinger) {
                    if (!Str::endsWith($singer->member->code, $virtualSinger)) {
                        continue;
                    }

                    $memberId = $key + 1;

                    if (!isset($results[$memberId]['tunes']['all'])) {
                        $results[$memberId]['tunes']['all'] = [];
                    }
                    $results[$memberId]['tunes']['all'][] = $event->tune;

                    if (!isset($results[$memberId]['total'])) {
                        $results[$memberId]['total'] = 0;
                    }
                    $results[$memberId]['total']++;

                    if ($event->tune->has_3d_mv) {
                        if (!isset($results[$memberId]['has_3d_mv_count'])) {
                            $results[$memberId]['has_3d_mv_count'] = 0;
                        }
                        $results[$memberId]['has_3d_mv_count']++;

                        if (!isset($results[$memberId]['tunes']['3dmv'])) {
                            $results[$memberId]['tunes']['3dmv'] = [];
                        }
                        $results[$memberId]['tunes']['3dmv'][] = $event->tune;
                    } else {
                        if (!isset($results[$memberId]['has_2d_mv_count'])) {
                            $results[$memberId]['has_2d_mv_count'] = 0;
                        }
                        $results[$memberId]['has_2d_mv_count']++;

                        if (!isset($results[$memberId]['tunes']['2dmv'])) {
                            $results[$memberId]['tunes']['2dmv'] = [];
                        }
                        $results[$memberId]['tunes']['2dmv'][] = $event->tune;
                    }
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
                'report_tunes',
                empty($results[$member->id]['tunes']['all']) ? null : $results[$member->id]['tunes']['all']
            );
            $member->setAttribute(
                'report_2dmv_tunes',
                empty($results[$member->id]['tunes']['2dmv']) ? null : $results[$member->id]['tunes']['2dmv']
            );
            $member->setAttribute(
                'report_3dmv_tunes',
                empty($results[$member->id]['tunes']['3dmv']) ? null : $results[$member->id]['tunes']['3dmv']
            );

            $member->setAttribute(
                'report_total_count',
                empty($results[$member->id]['total']) ? 0 : $results[$member->id]['total']
            );

            $member->setAttribute(
                'report_has_2d_mv_count',
                empty($results[$member->id]['has_2d_mv_count']) ? 0 : $results[$member->id]['has_2d_mv_count']
            );

            $member->setAttribute(
                'report_has_3d_mv_count',
                empty($results[$member->id]['has_3d_mv_count']) ? 0 : $results[$member->id]['has_3d_mv_count']
            );
        }

        return $members;
    }

    /**
     * メンバーごとのイベントスタンプ
     *
     * @return \App\Models\Member[]|MembersRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function aggregateEventStampsByMember()
    {
        $events = $this->eventsRepository->findAll([], ['starts_at' => 'asc']);

        $results = [];
        foreach ($events as $event) {
            /** @var \App\Models\Event $event */
            if (empty($event->bannerCard)) {
                continue;
            }

            if (empty($event->stamp_member_id)) {
                continue;
            }
            $memberId = $event->stamp_member_id;

            if (!isset($results[$memberId]['stamps'])) {
                $results[$memberId]['stamps'] = [];
            }
            $results[$memberId]['stamps'][] = $event;

            if (!isset($results[$memberId]['total'])) {
                $results[$memberId]['total'] = 0;
            }
            $results[$memberId]['total']++;

            if ($event->unit_count === 1) {
                // 箱イベ
                if (!isset($results[$memberId]['unit'])) {
                    $results[$memberId]['unit'] = 0;
                }
                $results[$memberId]['unit']++;
            } elseif ($event->unit_count > 1) {
                // 混合イベ
                if (!isset($results[$memberId]['mixed'])) {
                    $results[$memberId]['mixed'] = 0;
                }
                $results[$memberId]['mixed']++;
            }
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
                'report_stamps',
                empty($results[$member->id]['stamps']) ? null : $results[$member->id]['stamps']
            );

            $member->setAttribute(
                'report_total_count',
                empty($results[$member->id]['total']) ? 0 : $results[$member->id]['total']
            );

            $member->setAttribute(
                'report_unit_count',
                empty($results[$member->id]['unit']) ? 0 : $results[$member->id]['unit']
            );

            $member->setAttribute(
                'report_mixed_count',
                empty($results[$member->id]['mixed']) ? 0 : $results[$member->id]['mixed']
            );
        }

        return $members;
    }
}
