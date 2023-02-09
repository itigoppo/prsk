@php
    /**
     * @var \App\Models\Card $card
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Member[] $members
     */
@endphp

@extends('layouts.app')
@section('title', '集計(書き下ろし曲)')

@section('head')
    <script src="{{ asset('js/sortable-tables.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

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
                            @if(!empty($unit->getAttribute('report_tunes')))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">{{ $unit->short }}</span>
                                    </td>
                                    <td class="text-end">{{ $unit->getAttribute('report_has_2d_mv_count') }}</td>
                                    <td class="text-end">{{ $unit->getAttribute('report_has_3d_mv_count') }}</td>
                                    <td>
                                        @foreach($unit->getAttribute('report_tunes') as $tune)
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
                            @if(!empty($member->getAttribute('report_tunes')))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                    </td>
                                    <td class="text-end">{{ $member->getAttribute('report_has_2d_mv_count') }}</td>
                                    <td class="text-end">{{ $member->getAttribute('report_has_3d_mv_count') }}</td>
                                    <td>
                                        @foreach($member->getAttribute('report_tunes') as $tune)
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

    </div>
@endsection
