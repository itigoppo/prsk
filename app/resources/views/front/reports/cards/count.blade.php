@php
    /**
     * @var \App\Models\Card $card
     * @var \App\Models\Member[] $virtualSingers
     * @var \App\Models\Member[] $members
     */
    use App\Enums\Rarity;
@endphp

@extends('layouts.app')
@section('title', '集計(カード枚数)')

@section('head')
    <script src="{{ asset('js/sortable-tables.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'card-count'])
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
                        @foreach($virtualSingers as $member)
                            <tr>
                                <td data-sort="0-{{ $member->id }}">
                                    <span class="badge bg-white me-2"
                                          style="border: solid 1px {{ $member->bg_color }}; color: {{ $member->bg_color }}">{{ $member->short }}(ALL)</span>
                                </td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::STAR_FOUR . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::STAR_THREE . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::STAR_TWO . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::STAR_ONE . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::BIRTHDAY . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_total_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_hair_style_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_limited_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_fes_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_regular_count') }}</td>
                            </tr>
                        @endforeach

                        @foreach($members as $member)
                            <tr>
                                <td data-sort="{{ $member->unit->id }}-{{ $member->id }}">
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                </td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::STAR_FOUR . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::STAR_THREE . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::STAR_TWO . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::STAR_ONE . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_' . Rarity::BIRTHDAY . '_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_total_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_hair_style_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_limited_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_fes_count') }}</td>
                                <td class="text-end">{{ $member->getAttribute('report_regular_count') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
