@php
    /**
     * @var \App\Models\Unit[] $units
     */
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
                                                                    (混合)
                                                            </span>
                                                            @else
                                                                <span class="badge me-2"
                                                                      style="background-color: {{ $event->bannerCard->card->member->bg_color }}; color: {{ $event->bannerCard->card->member->color }}">
                                                                {{ $event->bannerCard->card->member->display_short }}
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
