@extends('layouts.app')
@section('title', '集計')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center my-2">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.event-histories') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #325d88 0%, #2b5876 100%); border-color: #325d88;">イベント履歴</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.event-count') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #325d88 0%, #2b5876 100%); border-color: #325d88;">イベント回数</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.event-cycles') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #325d88 0%, #2b5876 100%); border-color: #325d88;">イベントサイクル</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.event-attributes') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #325d88 0%, #2b5876 100%); border-color: #325d88;">イベント属性</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.event-tunes') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #325d88 0%, #2b5876 100%); border-color: #325d88;">イベント曲のMVタイプ</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.card-count') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #93c54b 0%, #a8e063 100%); border-color: #93c54b;">カード枚数</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.card-released') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #93c54b 0%, #a8e063 100%); border-color: #93c54b;">カード最終実装日</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.card-attributes') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #93c54b 0%, #a8e063 100%); border-color: #93c54b;">カード属性</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.card-skills') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #93c54b 0%, #a8e063 100%); border-color: #93c54b;">カードスキル</a>
                    </div>
                    <div class="col-lg-4 col-md-2 mb-2">
                        <a href="{{ route('front.reports.card-separate') }}"
                           class="rounded d-block p-3 text-white text-center"
                           style="background: linear-gradient(90deg, #93c54b 0%, #a8e063 100%); border-color: #93c54b;">カード内訳</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
