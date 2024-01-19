@php
    /**
     * @var \App\Models\Card $card
     * @var \App\Models\Member[] $virtualSingers
     * @var \App\Models\Member[] $members
     * @var array $labels
     * @var array $rarityPatterns
     * @var array $rarityStarFourPatterns
     * @var array $limitedPatterns
     */
@endphp

@extends('layouts.app')
@section('title', '集計(カード実装履歴)')

@section('head')
    <script src="{{ asset('js/reports.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'card-histories'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                @foreach($virtualSingers as $member)
                    <div class="card mb-2">
                        <div class="card-header">
                                <span class="badge bg-white me-2"
                                      style="border: solid 1px {{ $member->bg_color }}; color: {{ $member->bg_color }}">{{ $member->short }}(ALL)</span>
                        </div>
                        <div class="card-body">
                            @foreach($labels as $index => $label)
                                <div class="@if($index !== 0) mt-2 @endif">
                                    <div class="text-success">
                                        <i class="fa-regular fa-bookmark"></i>
                                        <span class="fw-bold">{{ $label['label'] }}</span>
                                    </div>
                                    @foreach($label['patterns'] as $pattern)
                                        <button class="btn btn-sm btn-outline-dark fs-7 py-0 mb-1" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#member-cards-collapse-vs-{{ $member->id }}-{{ str_replace('_', '-', $pattern['attribute']) }}"
                                                aria-expanded="false"
                                                aria-controls="member-cards-collapse-vs-{{ $member->id }}-{{ str_replace('_', '-', $pattern['attribute']) }}"
                                                data-url="{{ route('front.members.virtual-singer-cards', ['member_id' => $member->uuid, 'attribute' => $pattern['attribute']]) }}">
                                            <i class="fa-regular fa-square-check"></i> {{ $pattern['label'] }}
                                        </button>
                                    @endforeach

                                    @foreach($label['patterns'] as $pattern)
                                        <div
                                            id="member-cards-collapse-vs-{{ $member->id }}-{{ str_replace('_', '-', $pattern['attribute']) }}"
                                            class="mt-2 collapse member-cards-collapse">
                                            <div></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                @foreach($members as $member)
                    <div class="card mb-2">
                        <div class="card-header">
                                <span class="badge me-2"
                                      style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                        </div>
                        <div class="card-body">
                            @foreach($labels as $index => $label)
                                <div class="@if($index !== 0) mt-2 @endif">
                                    <div class="text-success">
                                        <i class="fa-regular fa-bookmark"></i>
                                        <span class="fw-bold">{{ $label['label'] }}</span>
                                    </div>
                                    @foreach($label['patterns'] as $pattern)
                                        <button class="btn btn-sm btn-outline-dark fs-7 py-0 mb-1" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#member-cards-collapse-{{ $member->id }}-{{ str_replace('_', '-', $pattern['attribute']) }}"
                                                aria-expanded="false"
                                                aria-controls="member-cards-collapse-{{ $member->id }}-{{ str_replace('_', '-', $pattern['attribute']) }}"
                                                data-url="{{ route('front.members.member-cards', ['member_id' => $member->uuid, 'attribute' => $pattern['attribute']]) }}">
                                            <i class="fa-regular fa-square-check"></i> {{ $pattern['label'] }}
                                        </button>
                                    @endforeach

                                    @foreach($label['patterns'] as $pattern)
                                        <div
                                            id="member-cards-collapse-{{ $member->id }}-{{ str_replace('_', '-', $pattern['attribute']) }}"
                                            class="mt-2 collapse member-cards-collapse">
                                            <div></div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
