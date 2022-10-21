@php
    /**
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Member[] $members
     * @var \App\Models\Card $card
     * @var array $eventUnits
     * @var array $eventMembers
     * @var array $cardMembers
     */
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
                            <th class="data-sort" style="width: 80px">ユニット</th>
                            <th>箱バナー最終</th>
                            <th>箱バナー回数</th>
                            <th>混合バナー最終</th>
                            <th>混合バナー回数</th>
                            <th>バナー合計数</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            <tr>
                                <td data-sort="{{ $unit->id }}">
                                    <span class="badge"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">{{ $unit->short }}</span>
                                </td>
                                @if(!empty($eventUnits[$unit->id]['unit']))
                                    <td>{{ $eventUnits[$unit->id]['unit']['date']->format('Y/m/d') }}</td>
                                    <td class="text-end">{{ $eventUnits[$unit->id]['unit']['count'] }}</td>
                                @else
                                    <td>-</td>
                                    <td class="text-end">0</td>
                                @endif
                                @if(!empty($eventUnits[$unit->id]['mixed']))
                                    <td>{{ $eventUnits[$unit->id]['mixed']['date']->format('Y/m/d') }}</td>
                                    <td class="text-end">{{ $eventUnits[$unit->id]['mixed']['count'] }}</td>
                                @else
                                    <td>-</td>
                                    <td class="text-end">0</td>
                                @endif
                                @if(!empty($eventUnits[$unit->id]['total']))
                                    <td class="text-end">{{ $eventUnits[$unit->id]['total']['count'] }}</td>
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
                            <th class="disable-sort" style="width: 80px">メンバー</th>
                            <th class="data-sort">ユニット</th>
                            <th>箱バナー最終</th>
                            <th>箱バナー回数</th>
                            <th>混合バナー最終</th>
                            <th>混合バナー回数</th>
                            <th>バナー合計数</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                </td>
                                <td data-sort="{{ $member->unit->id }}-{{ $member->id }}">{{ $member->unit->short }}</td>
                                @if(!empty($eventMembers[$member->id]['unit']))
                                    <td>{{ $eventMembers[$member->id]['unit']['date']->format('Y/m/d') }}</td>
                                    <td class="text-end">{{ $eventMembers[$member->id]['unit']['count'] }}</td>
                                @else
                                    <td>-</td>
                                    <td class="text-end">0</td>
                                @endif
                                @if(!empty($eventMembers[$member->id]['mixed']))
                                    <td>{{ $eventMembers[$member->id]['mixed']['date']->format('Y/m/d') }}</td>
                                    <td class="text-end">{{ $eventMembers[$member->id]['mixed']['count'] }}</td>
                                @else
                                    <td>-</td>
                                    <td class="text-end">0</td>
                                @endif
                                @if(!empty($eventMembers[$member->id]['total']))
                                    <td class="text-end">{{ $eventMembers[$member->id]['total']['count'] }}</td>
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
                            @if(!empty($eventUnits[$unit->id]['tunes']))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">{{ $unit->short }}</span>
                                    </td>
                                    <td>
                                        <dl class="row">
                                            @foreach($eventUnits[$unit->id]['turn'] as $turn => $events)
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
                            @if(!empty($eventUnits[$unit->id]['tunes']))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">{{ $unit->short }}</span>
                                    </td>
                                    <td class="text-end">{{ $eventUnits[$unit->id]['has_2d_mv_count'] }}</td>
                                    <td class="text-end">{{ $eventUnits[$unit->id]['has_3d_mv_count'] }}</td>
                                    <td>
                                        @foreach($eventUnits[$unit->id]['tunes'] as $tune)
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
                            @if(!empty($eventMembers[$member->id]['tunes']))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                    </td>
                                    <td class="text-end">{{ $eventMembers[$member->id]['has_2d_mv_count'] }}</td>
                                    <td class="text-end">{{ $eventMembers[$member->id]['has_3d_mv_count'] }}</td>
                                    <td>
                                        @foreach($eventMembers[$member->id]['tunes'] as $tune)
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
                            <th class="data-sort" style="width: 80px">メンバー</th>
                            <th>星4</th>
                            <th>星3</th>
                            <th>星2</th>
                            <th>星1</th>
                            <th>BD</th>
                            <th>合計</th>
                            <th>髪型</th>
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
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id][Rarity::STAR_FOUR]))
                                        {{ $cardMembers[$member->id][Rarity::STAR_FOUR]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id][Rarity::STAR_THREE]))
                                        {{ $cardMembers[$member->id][Rarity::STAR_THREE]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id][Rarity::STAR_TWO]))
                                        {{ $cardMembers[$member->id][Rarity::STAR_TWO]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id][Rarity::STAR_ONE]))
                                        {{ $cardMembers[$member->id][Rarity::STAR_ONE]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id][Rarity::BIRTHDAY]))
                                        {{ $cardMembers[$member->id][Rarity::BIRTHDAY]['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id]['total']))
                                        {{ $cardMembers[$member->id]['total']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id]['hair_style']))
                                        {{ $cardMembers[$member->id]['hair_style']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id]['limited']))
                                        {{ $cardMembers[$member->id]['limited']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id]['fes']))
                                        {{ $cardMembers[$member->id]['fes']['count'] }}
                                    @else
                                        0
                                    @endif
                                </td>
                                <td class="text-end">
                                    @if(!empty($cardMembers[$member->id]['regular']))
                                        {{ $cardMembers[$member->id]['regular']['count'] }}
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
                                    @if(!empty($cardMembers[$member->id][Rarity::STAR_FOUR]))
                                        {{ $cardMembers[$member->id][Rarity::STAR_FOUR]['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardMembers[$member->id][Rarity::STAR_THREE]))
                                        {{ $cardMembers[$member->id][Rarity::STAR_THREE]['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardMembers[$member->id][Rarity::STAR_TWO]))
                                        {{ $cardMembers[$member->id][Rarity::STAR_TWO]['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardMembers[$member->id]['limited']))
                                        {{ $cardMembers[$member->id]['limited']['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardMembers[$member->id]['fes']))
                                        {{ $cardMembers[$member->id]['fes']['date']->format('Y/m/d') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($cardMembers[$member->id]['regular']))
                                        {{ $cardMembers[$member->id]['regular']['date']->format('Y/m/d') }}
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

    </div>
@endsection
