@php
    /**
     * @var \App\Models\Event[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $events
     */
    use App\Models\Card;
@endphp

@extends('layouts.app')
@section('title', '集計(イベント履歴)')

@section('head')
    <script src="{{ asset('js/reports.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'event-histories'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">

                <div id="search-collapse">
                    <div class="card my-3">
                        <div class="card-body search">

                            <form method="GET" action="{{ route('front.reports.event-histories') }}">
                                <div class="row mb-2">
                                    <div>
                                        <div class="icheck-primary icheck-inline">
                                            <input id="search-ltd" class="form-check-input" type="checkbox" name="ltd"
                                                   value="1"{{ !empty($search['ltd']) ? ' checked' : '' }} />
                                            <label for="search-ltd">限定イベント</label>
                                        </div>

                                        <div class="icheck-primary icheck-inline">
                                            <label for="search-unit-only">
                                                <input id="search-unit-only" class="form-check-input" type="radio"
                                                       name="unit"
                                                       value="only"{{ !empty($search['unit']) && $search['unit'] === 'only' ? ' checked' : '' }} />
                                                箱イベ
                                            </label>
                                            <label for="search-unit-mix">
                                                <input id="search-unit-mix" class="form-check-input" type="radio"
                                                       name="unit"
                                                       value="mix"{{ !empty($search['unit']) && $search['unit'] === 'mix' ? ' checked' : '' }} />
                                                混合イベ
                                            </label>
                                            <label for="search-unit">
                                                <input id="search-unit" class="form-check-input" type="radio"
                                                       name="unit"
                                                       value=""{{ empty($search['unit']) ? ' checked' : '' }} />
                                                こだわらない
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0 mx-5">
                                    <div class="col">
                                        <a href="{{ route('front.reports.event-histories') }}"
                                           class="btn btn-sm btn-outline-dark w-100">
                                            <i class="fa-solid fa-rotate"></i> リセット
                                        </a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-sm w-100">
                                            <i class="fa-solid fa-magnifying-glass"></i> 検索
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div>
                    @foreach($events as $event)
                        <div class="card mb-2">
                            <div class="card-header d-flex justify-content-between bg-light">
                                <div>
                                    <span>{{ $event->starts_at->format('Y/m/d') }} 〜</span>
                                    <span
                                        class="badge badge-danger badge-pill me-2">{{ $event->starts_at->diffInDays($event->ends_at) }}</span>

                                    <span>{{ $event->name }}</span>
                                </div>
                                <div>
                                    @if(!empty($event->bannerCard) && $event->bannerCard->card->is_limited)
                                        <span
                                            class="badge border bg-white border-danger text-danger">限定</span>
                                    @endif
                                    <span
                                        class="badge border bg-white {{ $event->type->value === \App\Enums\EventType::MARATHON ? "border-warning text-warning" : "border-success text-success" }}">{{ $event->type->description}}</span>
                                    <span class="badge"
                                          style="background-color: {{ \App\Enums\Attribute::getColor($event->attribute->value) }};">{{ $event->attribute->description}}</span>

                                    @if($event->unit_count === 1)
                                        <span class="badge"
                                              style="background-color: {{ $event->eventMembers->first()->member->unit->bg_color }}; color: {{ $event->eventMembers->first()->member->unit->color }}">{{ $event->eventMembers->first()->member->unit->short }}</span>
                                    @else
                                        <span class="badge badge-secondary">混合</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    @foreach($event->eventCards as $eventCard)
                                        @if($eventCard->is_banner)
                                            <span class="badge me-2"
                                                  style="background-color: {{ $eventCard->card->member->bg_color }}; color: {{ $eventCard->card->member->color }}">{{ $eventCard->card->member->display_short }}</span>
                                        @else
                                            <span class="badge me-2"
                                                  style="border: solid 1px {{ $eventCard->card->member->bg_color }}; background-color: #ffffff; color: {{ $eventCard->card->member->bg_color }}">{{ $eventCard->card->member->display_short }}</span>
                                        @endif
                                    @endforeach
                                </div>
                                @if(!empty($event->tune))
                                <div class="mt-2">
                                    <i class="fa-solid fa-music"></i>
                                    @if($event->tune->has_3d_mv)
                                        <span class="badge bg-warning">3D</span>
                                    @elseif($event->tune->has_2d_mv)
                                        <span class="badge bg-success">2D</span>
                                    @endif
                                    {{ $event->tune->name }}
                                </div>
                                @endif
                                <div class="mt-2">

                                    <button class="btn btn-sm btn-outline-dark fs-7 py-0" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#event-card-collapse-{{ $event->id }}" aria-expanded="false"
                                            aria-controls="event-card-collapse-{{ $event->id }}"
                                            data-url="{{ route('front.events.event-members', ['event_id' => $event->uuid]) }}">
                                        <i class="fa-regular fa-square-check"></i> イベントカード
                                    </button>
                                    <button class="btn btn-sm btn-outline-dark fs-7 py-0" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#bonus-card-collapse-{{ $event->id }}" aria-expanded="false"
                                            aria-controls="bonus-card-collapse-{{ $event->id }}"
                                            data-url="{{ route('front.events.bonus-cards', ['event_id' => $event->uuid]) }}">
                                        <i class="fa-regular fa-square-check"></i> ボーナスカード
                                    </button>

                                    <div id="event-card-collapse-{{ $event->id }}" class="mt-2 collapse event-card-collapse">
                                        <div></div>
                                    </div>

                                    <div id="bonus-card-collapse-{{ $event->id }}" class="mt-2 collapse event-card-collapse">
                                        <div></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $events->links() }}
            </div>

        </div>

    </div>
@endsection
