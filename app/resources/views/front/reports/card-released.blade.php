@php
    /**
     * @var \App\Models\Card $card
     * @var \App\Models\Member[] $members
     */
    use App\Enums\Rarity;
@endphp

@extends('layouts.app')
@section('title', '集計(カード最終実装日)')

@section('head')
    <script src="{{ asset('js/sortable-tables.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'card-released'])
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
                                    {{ empty($member->getAttribute('report_' . Rarity::STAR_FOUR . '_date')) ? '-' : $member->getAttribute('report_' . Rarity::STAR_FOUR . '_date')->format('Y/m/d') }}
                                </td>
                                <td>
                                    {{ empty($member->getAttribute('report_' . Rarity::STAR_THREE . '_date')) ? '-' : $member->getAttribute('report_' . Rarity::STAR_THREE . '_date')->format('Y/m/d') }}
                                </td>
                                <td>
                                    {{ empty($member->getAttribute('report_' . Rarity::STAR_TWO . '_date')) ? '-' : $member->getAttribute('report_' . Rarity::STAR_TWO . '_date')->format('Y/m/d') }}
                                </td>
                                <td>
                                    {{ empty($member->getAttribute('report_limited_date')) ? '-' : $member->getAttribute('report_limited_date')->format('Y/m/d') }}
                                </td>
                                <td>
                                    {{ empty($member->getAttribute('report_fes_date')) ? '-' : $member->getAttribute('report_fes_date')->format('Y/m/d') }}
                                </td>
                                <td>
                                    {{ empty($member->getAttribute('report_regular_date')) ? '-' : $member->getAttribute('report_regular_date')->format('Y/m/d') }}
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
