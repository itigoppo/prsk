@php
    /**
     * @var \App\Models\Card $card
     * @var \App\Models\Member[] $members
     */
@endphp

@extends('layouts.app')
@section('title', '集計(スタンプ)')

@section('head')
    <script src="{{ asset('js/sortable-tables.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'event-stamps'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">

                <div>
                    <table class="table table-sm table-striped table-hover table-sort">
                        <thead class="table-light text-center">
                        <tr>
                            <th class="data-sort" style="width: 80px">メンバー</th>
                            <th style="width: 70px">箱イベ</th>
                            <th style="width: 70px">混合</th>
                            <th style="width: 70px">合計</th>
                            <th class="disable-sort">履歴</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            @if(!empty($member->getAttribute('report_stamps')))
                                <tr>
                                    <td data-sort="{{ $member->unit->id }}-{{ $member->id }}">
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                    </td>
                                    <td class="text-end">{{ $member->getAttribute('report_unit_count') }}</td>
                                    <td class="text-end">{{ $member->getAttribute('report_mixed_count') }}</td>
                                    <td class="text-end">{{ $member->getAttribute('report_total_count') }}</td>
                                    <td>
                                        @foreach($member->getAttribute('report_stamps') as $event)
                                            @php
                                                /** @var \App\Models\Event $event */
                                            @endphp
                                            @if(!empty($event->bannerCard))
                                                @if($event->unit_count > 1)
                                                    <span class="badge border border-dark text-dark">{{ $event->stamp_text }}(混合)</span>
                                                @else
                                                    <span class="badge border border-secondary bg-secondary text-white">{{ $event->stamp_text }}</span>
                                                @endif
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

    </div>
@endsection
