@php
    /**
     * @var \App\Models\Card $card
     * @var \App\Models\Member[] $virtualSingers
     * @var \App\Models\Member[] $members
     */
    use App\Enums\SkillEffect;
    use App\Enums\Rarity;
@endphp

@extends('layouts.app')
@section('title', '集計(カードスキル)')

@section('head')
    <script src="{{ asset('js/sortable-tables.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'card-attributes'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                @foreach($virtualSingers as $member)
                    <div class="row">
                        @php
                            /** @var \App\Models\Member $member */
                        @endphp

                        <div class="card mb-2">
                            <div class="card-header">
                                        <span class="badge bg-white me-2"
                                              style="border: solid 1px {{ $member->bg_color }}; color: {{ $member->bg_color }}">{{ $member->short }}(ALL)</span>
                            </div>
                            <div class="card-body">
                                <table class="table table-sm table-striped table-hover">
                                    <thead class="table-light text-center">
                                    <tr>
                                        <th>-</th>
                                        @foreach(SkillEffect::getValues() as $skill)
                                            <th>
                                                        <span class="badge"
                                                              style="background-color: {{ SkillEffect::getColor($skill) }};">{{ mb_convert_kana(SkillEffect::getDescription($skill), 'k') }}</span>
                                            </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach(Rarity::getValues() as $rarity)
                                        <tr>
                                            <td>{{ Rarity::getDescription($rarity) }}</td>
                                            @foreach(SkillEffect::getValues() as $skill)
                                                <td class="text-end">
                                                    {{ $member->getAttribute('report_' . $rarity . '_' . $skill . '_count') }}
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

                @foreach($members as $member)
                    @php
                        /** @var \App\Models\Member $member */
                    @endphp
                    <div class="row">
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
                                        @foreach(SkillEffect::getValues() as $skill)
                                            <th>
                                                        <span class="badge"
                                                              style="background-color: {{ SkillEffect::getColor($skill) }};">{{ mb_convert_kana(SkillEffect::getDescription($skill), 'k') }}</span>
                                            </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach(Rarity::getValues() as $rarity)
                                        <tr>
                                            <td>{{ Rarity::getDescription($rarity) }}</td>
                                            @foreach(SkillEffect::getValues() as $skill)
                                                <td class="text-end">
                                                    {{ $member->getAttribute('report_' . $rarity . '_' . $skill . '_count') }}
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
        </div>

    </div>
@endsection
