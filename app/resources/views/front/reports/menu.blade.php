@php
    /**
     * @var string $current
     * @var \App\Models\Card $card
     */
@endphp

<div class="row justify-content-center my-2" id="{{ $current }}">
    <div class="col-md-8">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a href="#events" class="nav-link{{ $current === 'events' ? ' active' : '' }}">イベント集計</a>
            </li>
            <li class="nav-item">
                <a href="#event-turn" class="nav-link{{ $current === 'event-turn' ? ' active' : '' }}">イベント周回</a>
            </li>
            <li class="nav-item">
                <a href="#event-tunes" class="nav-link{{ $current === 'event-tunes' ? ' active' : '' }}">書き下ろし曲のMVタイプ</a>
            </li>
            <li class="nav-item">
                <a href="#cards" class="nav-link{{ $current === 'cards' ? ' active' : '' }}">カード枚数集計</a>
            </li>
            <li class="nav-item">
                <a href="#card-released-at" class="nav-link{{ $current === 'card-released-at' ? ' active' : '' }}">カード実装日集計</a>
            </li>
            <li class="nav-item">
                <a href="#card-attribute" class="nav-link{{ $current === 'card-attribute' ? ' active' : '' }}">タイプ別カード集計</a>
            </li>
            <p class="mt-2 h6 text-danger">
                <i class="fa-solid fa-circle-exclamation"></i> 集計データはカード「{{ $card->display_name }}」実装分まで({{ $card->released_at->format('Y/m/d') }})
            </p>
        </ul>
    </div>
</div>
