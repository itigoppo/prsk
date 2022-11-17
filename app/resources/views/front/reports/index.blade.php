@php
    /**
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Member[] $members
     * @var \App\Models\Card $card
     * @var array $eventsByUnit
     * @var array $eventsByMember
     * @var array $cardsByRarity
     * @var array $cardsByAttribute
     */
    use App\Enums\Attribute;
    use App\Enums\Rarity;
@endphp

@extends('layouts.app')
@section('title', '集計')

@section('head')
    <script src="{{ asset('js/sortable-tables.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'events'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div>
                    <table class="table table-sm table-striped table-hover table-sort">
                        <thead class="table-light text-center">
                        <tr>
                            <th class="data-sort" style="width: 80px">ﾕﾆｯﾄ</th>
                            <th>箱ﾊﾞﾅｰ最終</th>
                            <th>箱ﾊﾞﾅｰ回数</th>
                            <th>混合ﾊﾞﾅｰ最終</th>
                            <th>混合ﾊﾞﾅｰ回数</th>
                            <th>ﾊﾞﾅｰ合計数</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            <tr>
                                <td data-sort="{{ $unit->id }}">
                                    <span class="badge"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">{{ $unit->short }}</span>
                                </td>
                                @if(!empty($eventsByUnit[$unit->id]['unit']))
                                    <td>{{ $eventsByUnit[$unit->id]['unit']['date']->format('Y/m/d') }}</td>
                                    <td class="text-end">{{ $eventsByUnit[$unit->id]['unit']['count'] }}</td>
                                @else
                                    <td>-</td>
                                    <td class="text-end">0</td>
                                @endif
                                @if(!empty($eventsByUnit[$unit->id]['mixed']))
                                    <td>{{ $eventsByUnit[$unit->id]['mixed']['date']->format('Y/m/d') }}</td>
                                    <td class="text-end">{{ $eventsByUnit[$unit->id]['mixed']['count'] }}</td>
                                @else
                                    <td>-</td>
                                    <td class="text-end">0</td>
                                @endif
                                @if(!empty($eventsByUnit[$unit->id]['total']))
                                    <td class="text-end">{{ $eventsByUnit[$unit->id]['total']['count'] }}</td>
                                @else
                                    <td class="text-end">0</td>
                                @endif
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>

                <div>
                    <table class="table table-sm table-striped table-hover table-sort">
                        <thead class="table-light text-center">
                        <tr>
                            <th class="disable-sort" style="width: 80px">ﾒﾝﾊﾞｰ</th>
                            <th class="data-sort">ﾕﾆｯﾄ</th>
                            <th>箱ﾊﾞﾅｰ最終</th>
                            <th>箱ﾊﾞﾅｰ回数</th>
                            <th>混合ﾊﾞﾅｰ最終</th>
                            <th>混合ﾊﾞﾅｰ回数</th>
                            <th>ﾊﾞﾅｰ合計数</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            @if(empty($eventsByMember[$member->id]['total']))
                                @continue
                            @endif
                            <tr>
                                <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                </td>
                                <td data-sort="{{ $member->unit->id }}-{{ $member->id }}">{{ $member->unit->short }}</td>
                                @if(!empty($eventsByMember[$member->id]['unit']))
                                    <td>{{ $eventsByMember[$member->id]['unit']['date']->format('Y/m/d') }}</td>
                                    <td class="text-end">{{ $eventsByMember[$member->id]['unit']['count'] }}</td>
                                @else
                                    <td>-</td>
                                    <td class="text-end">0</td>
                                @endif
                                @if(!empty($eventsByMember[$member->id]['mixed']))
                                    <td>{{ $eventsByMember[$member->id]['mixed']['date']->format('Y/m/d') }}</td>
                                    <td class="text-end">{{ $eventsByMember[$member->id]['mixed']['count'] }}</td>
                                @else
                                    <td>-</td>
                                    <td class="text-end">0</td>
                                @endif
                                @if(!empty($eventsByMember[$member->id]['total']))
                                    <td class="text-end">{{ $eventsByMember[$member->id]['total']['count'] }}</td>
                                @else
                                    <td class="text-end">0</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('front.reports.menu', ['current' => 'event-turn'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th style="width: 80px">ユニット</th>
                            <th>周回履歴</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            @if(!empty($eventsByUnit[$unit->id]['tunes']))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">{{ $unit->short }}</span>
                                    </td>
                                    <td>
                                        <dl class="row">
                                            @foreach($eventsByUnit[$unit->id]['turn'] as $turn => $events)
                                                <dt class="col-sm-1">{{ $turn }}</dt>
                                                <dd class="col-sm-11">
                                                    @foreach($events as $event)
                                                        @php
                                                            /** @var \App\Models\Event $event */
                                                        @endphp

                                                        @if(!empty($event->bannerCard))
                                                            <span class="badge me-2"
                                                                  style="background-color: {{ $event->bannerCard->card->member->bg_color }}; color: {{ $event->bannerCard->card->member->color }}">
                                                                {{ $event->bannerCard->card->member->display_short }}
                                                                @if($event->unit_count > 1)
                                                                    (混合)
                                                                @endif
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                </dd>
                                            @endforeach
                                        </dl>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('front.reports.menu', ['current' => 'event-tunes'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th style="width: 80px">ユニット</th>
                            <th style="width: 70px">2D数</th>
                            <th style="width: 70px">3D数</th>
                            <th>履歴</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            @if(!empty($eventsByUnit[$unit->id]['tunes']))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">{{ $unit->short }}</span>
                                    </td>
                                    <td class="text-end">{{ $eventsByUnit[$unit->id]['has_2d_mv_count'] }}</td>
                                    <td class="text-end">{{ $eventsByUnit[$unit->id]['has_3d_mv_count'] }}</td>
                                    <td>
                                        @foreach($eventsByUnit[$unit->id]['tunes'] as $tune)
                                            @php
                                                /** @var \App\Models\Tune $tune */
                                            @endphp
                                            @if($tune->has_3d_mv)
                                                <span class="badge rounded-pill bg-secondary">3D</span>
                                            @else
                                                <span class="badge rounded-pill bg-dark">2D</span>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th style="width: 80px">メンバー</th>
                            <th style="width: 70px">2D数</th>
                            <th style="width: 70px">3D数</th>
                            <th>履歴</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            @if(!empty($eventsByMember[$member->id]['tunes']))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                    </td>
                                    <td class="text-end">{{ $eventsByMember[$member->id]['has_2d_mv_count'] }}</td>
                                    <td class="text-end">{{ $eventsByMember[$member->id]['has_3d_mv_count'] }}</td>
                                    <td>
                                        @foreach($eventsByMember[$member->id]['tunes'] as $tune)
                                            @php
                                                /** @var \App\Models\Tune $tune */
                                            @endphp
                                            @if($tune->has_3d_mv)
                                                <span class="badge rounded-pill bg-secondary">3D</span>
                                            @else
                                                <span class="badge rounded-pill bg-dark">2D</span>
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('front.reports.menu', ['current' => 'cards'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div>
                    <table class="table table-sm table-striped table-hover table-sort">
                        <thead class="table-light text-center">
                        <tr>
                            <th class="data-sort" style="width: 80px">ﾒﾝﾊﾞｰ</th>
                            <th>星4</th>
                            <th>星3</th>
                            <th>星2</th>
                            <th>星1</th>
                            <th>BD</th>
                            <th>合計</th>
                            <th>髪型</th>
                            <th>限定</th>
                            <th>ﾌｪｽ限</th>
                            <th>恒常</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cardsByRarity['vs'] as $virtualSingerKey => $virtualSingerValues)
                            @php
                                /** @var \App\Models\Member $member */
                                $member = $members[$virtualSingerKey];
                            @endphp
                            <tr>
                                <td data-sort="0-{{ $member->id }}">
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->short }}(ALL)</span>
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues[Rarity::STAR_FOUR]))
                                        {{ $virtualSingerValues[Rarity::STAR_FOUR]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues[Rarity::STAR_THREE]))
                                        {{ $virtualSingerValues[Rarity::STAR_THREE]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues[Rarity::STAR_TWO]))
                                        {{ $virtualSingerValues[Rarity::STAR_TWO]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues[Rarity::STAR_ONE]))
                                        {{ $virtualSingerValues[Rarity::STAR_ONE]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues[Rarity::BIRTHDAY]))
                                        {{ $virtualSingerValues[Rarity::BIRTHDAY]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues['total']))
                                        {{ $virtualSingerValues['total']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues['hair_style']))
                                        {{ $virtualSingerValues['hair_style']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues['limited']))
                                        {{ $virtualSingerValues['limited']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues['fes']))
                                        {{ $virtualSingerValues['fes']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($virtualSingerValues['regular']))
                                        {{ $virtualSingerValues['regular']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        @foreach($members as $member)
                            <tr>
                                <td data-sort="{{ $member->unit->id }}-{{ $member->id }}">
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id][Rarity::STAR_FOUR]))
                                        {{ $cardsByRarity[$member->id][Rarity::STAR_FOUR]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id][Rarity::STAR_THREE]))
                                        {{ $cardsByRarity[$member->id][Rarity::STAR_THREE]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id][Rarity::STAR_TWO]))
                                        {{ $cardsByRarity[$member->id][Rarity::STAR_TWO]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id][Rarity::STAR_ONE]))
                                        {{ $cardsByRarity[$member->id][Rarity::STAR_ONE]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id][Rarity::BIRTHDAY]))
                                        {{ $cardsByRarity[$member->id][Rarity::BIRTHDAY]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id]['total']))
                                        {{ $cardsByRarity[$member->id]['total']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id]['hair_style']))
                                        {{ $cardsByRarity[$member->id]['hair_style']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id]['limited']))
                                        {{ $cardsByRarity[$member->id]['limited']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id]['fes']))
                                        {{ $cardsByRarity[$member->id]['fes']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardsByRarity[$member->id]['regular']))
                                        {{ $cardsByRarity[$member->id]['regular']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('front.reports.menu', ['current' => 'card-released-at'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div>
                    <table class="table table-sm table-striped table-hover table-sort">
                        <thead class="table-light text-center">
                        <tr>
                            <th class="data-sort" style="width: 80px">メンバー</th>
                            <th>星4</th>
                            <th>星3</th>
                            <th>星2</th>
                            <th>限定</th>
                            <th>フェス限</th>
                            <th>恒常</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td data-sort="{{ $member->unit->id }}-{{ $member->id }}">
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                </td>
                                <td>
                                    @if(!empty($cardsByRarity[$member->id][Rarity::STAR_FOUR]))
                                        {{ $cardsByRarity[$member->id][Rarity::STAR_FOUR]['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardsByRarity[$member->id][Rarity::STAR_THREE]))
                                        {{ $cardsByRarity[$member->id][Rarity::STAR_THREE]['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardsByRarity[$member->id][Rarity::STAR_TWO]))
                                        {{ $cardsByRarity[$member->id][Rarity::STAR_TWO]['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardsByRarity[$member->id]['limited']))
                                        {{ $cardsByRarity[$member->id]['limited']['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardsByRarity[$member->id]['fes']))
                                        {{ $cardsByRarity[$member->id]['fes']['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardsByRarity[$member->id]['regular']))
                                        {{ $cardsByRarity[$member->id]['regular']['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('front.reports.menu', ['current' => 'card-attribute'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">

                @foreach($cardsByAttribute['vs']->chunk(2) as $items)
                    <div class="row">
                        @foreach($items as $virtualSingerKey => $virtualSingerValues)
                            @php
                                /** @var \App\Models\Member $member */
                                $member = $members[$virtualSingerKey];
                            @endphp
                            <div class="col-sm-6">
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <span class="badge me-2"
                                              style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->short }}(ALL)</span>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-striped table-hover">
                                            <thead class="table-light text-center">
                                            <tr>
                                                <th>-</th>
                                                @foreach(Attribute::getValues() as $attribute)
                                                    <th>{{ mb_convert_kana(Attribute::getDescription($attribute), 'k') }}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach(Rarity::getValues() as $rarity)
                                                <tr>
                                                    <td>{{ Rarity::getDescription($rarity) }}</td>
                                                    @foreach(Attribute::getValues() as $attribute)
                                                        <td class="text-end">
                                                            @if(!empty($virtualSingerValues[$rarity][$attribute]))
                                                                {{ $virtualSingerValues[$rarity][$attribute] }}
                                                            @else
                                                                0
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                @foreach($members->chunk(2) as $items)
                    <div class="row">
                        @foreach($items as $member)
                            <div class="col-sm-6">
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <span class="badge me-2"
                                              style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-sm table-striped table-hover">
                                            <thead class="table-light text-center">
                                            <tr>
                                                <th>-</th>
                                                @foreach(Attribute::getValues() as $attribute)
                                                    <th>{{ mb_convert_kana(Attribute::getDescription($attribute), 'k') }}</th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach(Rarity::getValues() as $rarity)
                                                <tr>
                                                    <td>{{ Rarity::getDescription($rarity) }}</td>
                                                    @foreach(Attribute::getValues() as $attribute)
                                                        <td class="text-end">
                                                            @if(!empty($cardsByAttribute[$member->id][$rarity][$attribute]))
                                                                {{ $cardsByAttribute[$member->id][$rarity][$attribute] }}
                                                            @else
                                                                0
                                                            @endif
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
