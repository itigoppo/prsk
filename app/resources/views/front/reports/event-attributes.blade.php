@php
    /**
     * @var array $attributes
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Member[] $members
     */
    use App\Enums\Attribute;
@endphp

@extends('layouts.app')
@section('title', '集計(イベント属性)')

@section('content')
    <div class="container-fluid">

        @include('front.reports.menu', ['current' => 'event-attributes'])
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th>-</th>
                            @foreach(Attribute::getValues() as $attribute)
                                <th>
                                    <span class="badge"
                                          style="background-color: {{ Attribute::getColor($attribute) }};">{{ Attribute::getDescription($attribute) }}</span>
                                </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>箱イベ</td>
                            @foreach(Attribute::getValues() as $attribute)
                                <td class="text-end">
                                    {{ empty($attributes[$attribute]['unit']) ? 0 : $attributes[$attribute]['unit'] }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>混合イベ</td>
                            @foreach(Attribute::getValues() as $attribute)
                                <td class="text-end">
                                    {{ empty($attributes[$attribute]['mixed']) ? 0 : $attributes[$attribute]['mixed'] }}
                                </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>合計</td>
                            @foreach(Attribute::getValues() as $attribute)
                                <td class="text-end">
                                    {{ empty($attributes[$attribute]['total']) ? 0 : $attributes[$attribute]['total'] }}
                                </td>
                            @endforeach
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th style="width: 80px">ユニット</th>
                            <th style="width: 120px">回数</th>
                            <th>属性履歴</th>
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
                                        <dl>
                                            @foreach(Attribute::getValues() as $attribute)
                                                <dt class="col-sm-1">
                                                <span class="badge"
                                                      style="background-color: {{ Attribute::getColor($attribute) }};">{{ Attribute::getDescription($attribute) }}</span>
                                                </dt>
                                                <dd class="col-sm-11">
                                                    @php
                                                        $count = $unit->getAttribute('report_attributes');
                                                    @endphp

                                                    <span class="fs-8">{{ isset($count[$attribute]['total']) ?  $count[$attribute]['total'] : '0'}}
                                                    (箱：{{ isset($count[$attribute]['unit']) ?  $count[$attribute]['unit'] : '0'}}
                                                    /
                                                    混合：{{ isset($count[$attribute]['mixed']) ?  $count[$attribute]['mixed'] : '0'}}
                                                    )</span>
                                                </dd>
                                            @endforeach
                                        </dl>
                                    </td>
                                    <td>

                                        @foreach($unit->getAttribute('report_events') as $event)
                                            @php
                                                /** @var \App\Models\Event $event */
                                            @endphp
                                            @if(!empty($event->bannerCard))
                                                @if($event->unit_count > 1)
                                                    <span class="badge bg-white"
                                                          style="border: solid 1px {{ Attribute::getColor($event->attribute->value) }}; color: {{ Attribute::getColor($event->attribute->value) }};">{{ $event->attribute->description }}(混合)</span>
                                                @else
                                                    <span class="badge"
                                                          style="background-color: {{ Attribute::getColor($event->attribute->value) }};">{{ $event->attribute->description }}</span>
                                                @endif
                                            @endif
                                        @endforeach

                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th style="width: 80px">メンバー</th>
                            <th style="width: 120px">回数</th>
                            <th>属性履歴</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            @if(!empty($member->getAttribute('report_events')))
                                <tr>
                                    <td>
                                    <span class="badge me-2"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">{{ $member->display_short }}</span>
                                    </td>
                                    <td>
                                        <dl>
                                            @foreach(Attribute::getValues() as $attribute)
                                                <dt class="col-sm-1">
                                                <span class="badge"
                                                      style="background-color: {{ Attribute::getColor($attribute) }};">{{ Attribute::getDescription($attribute) }}</span>
                                                </dt>
                                                <dd class="col-sm-11">
                                                    @php
                                                        $count = $member->getAttribute('report_attributes');
                                                    @endphp

                                                    <span class="fs-8">{{ isset($count[$attribute]['total']) ?  $count[$attribute]['total'] : '0'}}
                                                    (箱：{{ isset($count[$attribute]['unit']) ?  $count[$attribute]['unit'] : '0'}}
                                                    /
                                                    混合：{{ isset($count[$attribute]['mixed']) ?  $count[$attribute]['mixed'] : '0'}}
                                                    )</span>
                                                </dd>
                                            @endforeach
                                        </dl>
                                    </td>
                                    <td>

                                        @foreach($member->getAttribute('report_events') as $event)
                                            @php
                                                /** @var \App\Models\Event $event */
                                            @endphp
                                            @if(!empty($event->bannerCard))
                                                @if($event->unit_count > 1)
                                                    <span class="badge bg-white"
                                                          style="border: solid 1px {{ Attribute::getColor($event->attribute->value) }}; color: {{ Attribute::getColor($event->attribute->value) }};">{{ $event->attribute->description }}(混合)</span>
                                                @else
                                                    <span class="badge"
                                                          style="background-color: {{ Attribute::getColor($event->attribute->value) }};">{{ $event->attribute->description }}</span>
                                                @endif
                                            @endif
                                        @endforeach

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
