@php
    /**
     * @var \App\Models\Card $card
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Member[] $members
     */
@endphp

@extends('layouts.app')
@section('title', '集計(イベント回数)')

@section('head')
    <script src="{{ asset('js/sortable-tables.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'event-count'])
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

                                <td>
                                    {{ empty($unit->getAttribute('report_unit_date')) ? '-' : $unit->getAttribute('report_unit_date')->format('Y/m/d') }}
                                </td>
                                <td class="text-end">{{ $unit->getAttribute('report_unit_count') }}</td>

                                <td>
                                    {{ empty($unit->getAttribute('report_mixed_date')) ? '-' : $unit->getAttribute('report_mixed_date')->format('Y/m/d') }}
                                </td>
                                <td class="text-end">{{ $unit->getAttribute('report_mixed_count') }}</td>

                                <td class="text-end">{{ $unit->getAttribute('report_total_count') }}</td>
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
                            @if(empty($member->getAttribute('report_total_count')))
                                @continue
                            @endif
                            <tr>
                                <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                </td>
                                <td data-sort="{{ $member->unit->id }}-{{ $member->id }}">{{ $member->unit->short }}</td>

                                <td>
                                    {{ empty($member->getAttribute('report_unit_date')) ? '-' : $member->getAttribute('report_unit_date')->format('Y/m/d') }}
                                </td>
                                <td class="text-end">{{ $member->getAttribute('report_unit_count') }}</td>

                                <td>
                                    {{ empty($member->getAttribute('report_mixed_date')) ? '-' : $member->getAttribute('report_mixed_date')->format('Y/m/d') }}
                                </td>
                                <td class="text-end">{{ $member->getAttribute('report_mixed_count') }}</td>

                                <td class="text-end">{{ $member->getAttribute('report_total_count') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
@endsection
