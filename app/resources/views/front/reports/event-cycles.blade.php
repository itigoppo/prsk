@php
    /**
     * @var array $cycles
     * @var \App\Models\Unit[] $units
     */
    use App\Enums\Attribute;
@endphp

@extends('layouts.app')
@section('title', '集計(イベントサイクル)')

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'event-cycles'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">

                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th style="width: 80px">サイクル</th>
                            <th>ユニット</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cycles as $cycle => $value)
                            <tr>
                                <td>{{ $cycle }}</td>
                                <td>
                                    @foreach($value['events'] as $event)
                                        @php
                                            /** @var \App\Models\Event $event */
                                        @endphp

                                        @if(!empty($event->bannerCard))
                                            @if($event->unit_count > 1)
                                                <span class="badge me-2"
                                                      style="border: solid 1px {{ $event->bannerCard->card->member->unit->bg_color }}; background-color: #ffffff; color: {{ $event->bannerCard->card->member->unit->bg_color }}">
                                                    {{ $event->bannerCard->card->member->unit->short }}
                                                    (混合{{ $event->bannerCard->card->is_limited ? '/限定' : '' }})
                                                </span>
                                            @else
                                                <span class="badge me-2"
                                                      style="background-color: {{ $event->bannerCard->card->member->unit->bg_color }}; color: {{ $event->bannerCard->card->member->unit->color }}">
                                                    {{ $event->bannerCard->card->member->unit->short }}
                                                    {{ $event->bannerCard->card->is_limited ? '(限定)' : '' }}
                                                </span>
                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th style="width: 80px">サイクル</th>
                            <th style="width: 80px">重複した属性</th>
                            <th style="width: 80px">不足した属性</th>
                            <th>属性</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cycles as $cycle => $value)
                            <tr>
                                <td>{{ $cycle }}</td>
                                <td>
                                    @if(!empty($value['duplicate_attributes']))
                                        @foreach($value['duplicate_attributes'] as $attribute)
                                            <span class="badge me-2 bg-white"
                                                  style="border: solid 1px {{ Attribute::getColor($attribute) }}; color: {{ Attribute::getColor($attribute) }}">
                                                {{ Attribute::getDescription($attribute) }}
                                            </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if(!empty($value['shortage_attributes']))
                                        @foreach($value['shortage_attributes'] as $attribute)
                                            <span class="badge me-2 bg-white"
                                                  style="border: solid 1px {{ Attribute::getColor($attribute) }}; color: {{ Attribute::getColor($attribute) }}">
                                                {{ Attribute::getDescription($attribute) }}
                                            </span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @foreach($value['events'] as $event)
                                        @php
                                            /** @var \App\Models\Event $event */
                                        @endphp

                                        @if(!empty($event->bannerCard))
                                            @if($event->unit_count > 1)
                                                <span class="badge me-2 bg-white"
                                                      style="border: solid 1px {{ Attribute::getColor($event->attribute->value) }}; color: {{ Attribute::getColor($event->attribute->value) }}">
                                                    {{ $event->attribute->description }}
                                                    (混合{{ $event->bannerCard->card->is_limited ? '/限定' : '' }})
                                                </span>
                                            @else
                                                <span class="badge me-2 text-white"
                                                      style="background-color: {{ Attribute::getColor($event->attribute->value) }}; }}">
                                                    {{ $event->attribute->description }}
                                                    {{ $event->bannerCard->card->is_limited ? '(限定)' : '' }}
                                                </span>
                                            @endif
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th style="width: 80px">ユニット</th>
                            <th>サイクル</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                            @if(!empty($unit->getAttribute('report_events')))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">{{ $unit->short }}</span>
                                    </td>
                                    <td>
                                        <dl class="row">
                                            @foreach($unit->getAttribute('report_events') as $cycle => $events)
                                                <dt class="col-sm-1">{{ $cycle }}</dt>
                                                <dd class="col-sm-11">
                                                    @foreach($events as $event)
                                                        @php
                                                            /** @var \App\Models\Event $event */
                                                        @endphp

                                                        @if(!empty($event->bannerCard))
                                                            @if($event->unit_count > 1)
                                                                <span class="badge me-2"
                                                                      style="border: solid 1px {{ $event->bannerCard->card->member->bg_color }}; background-color: #ffffff; color: {{ $event->bannerCard->card->member->bg_color }}">
                                                                {{ $event->bannerCard->card->member->display_short }}
                                                                (混合{{ $event->bannerCard->card->is_limited ? '/限定' : '' }})
                                                            </span>
                                                            @else
                                                                <span class="badge me-2"
                                                                      style="background-color: {{ $event->bannerCard->card->member->bg_color }}; color: {{ $event->bannerCard->card->member->color }}">
                                                                {{ $event->bannerCard->card->member->display_short }}
                                                                    {{ $event->bannerCard->card->is_limited ? '(限定)' : '' }}
                                                            </span>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </dd>
                                            @endforeach
                                        </dl>
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
