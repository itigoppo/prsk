@php
    /**
     * @var string $current
     * @var \App\Models\Card $card
     */
    use App\Models\Card;
@endphp

<div class="row justify-content-center my-2" id="{{ $current }}">
    <div class="col-md-8">
        <ul class="nav nav-pills">
            <li class="nav-item me-1 mb-1">
                <a href="{{ route('front.reports.event-histories') }}"
                   class="nav-link{{ Request::routeIs('front.reports.event-histories') ? ' active' : '' }}">イベント履歴</a>
            </li>
            <li class="nav-item me-1 mb-1">
                <a href="{{ route('front.reports.event-count') }}"
                   class="nav-link{{ Request::routeIs('front.reports.event-count') ? ' active' : '' }}">イベント回数</a>
            </li>
            <li class="nav-item me-1 mb-1">
                <a href="{{ route('front.reports.event-cycles') }}"
                   class="nav-link{{ Request::routeIs('front.reports.event-cycles') ? ' active' : '' }}">イベントサイクル</a>
            </li>
            <li class="nav-item me-1 mb-1">
                <a href="{{ route('front.reports.event-attributes') }}"
                   class="nav-link{{ Request::routeIs('front.reports.event-attributes') ? ' active' : '' }}">イベント属性</a>
            </li>
            <li class="nav-item me-1 mb-1">
                <a href="{{ route('front.reports.event-tunes') }}"
                   class="nav-link{{ Request::routeIs('front.reports.event-tunes') ? ' active' : '' }}">イベント曲のMVタイプ</a>
            </li>
            <li class="nav-item me-1 mb-1">
                <a href="{{ route('front.reports.card-count') }}"
                   class="nav-link{{ Request::routeIs('front.reports.card-count') ? ' active' : '' }}">カード枚数</a>
            </li>
            <li class="nav-item me-1 mb-1">
                <a href="{{ route('front.reports.card-released') }}"
                   class="nav-link{{ Request::routeIs('front.reports.card-released') ? ' active' : '' }}">カード最終実装日</a>
            </li>
            <li class="nav-item me-1 mb-1">
                <a href="{{ route('front.reports.card-attributes') }}"
                   class="nav-link{{ Request::routeIs('front.reports.card-attributes') ? ' active' : '' }}">カード属性</a>
            </li>
        </ul>
        <p class="mt-2 h6 text-danger">
            <i class="fa-solid fa-circle-exclamation"></i> 集計データはカード「<img
                src="{{ Card::url(route('medias.cards', ['card_id' => $card->uuid, 'mode' => 'normal']), 600) }}"
                alt="{{ $card->display_name }}" width="30"> {{ $card->display_name }}
            」実装分まで({{ $card->released_at->format('Y/m/d') }})
        </p>
    </div>
</div>
