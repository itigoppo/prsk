@php
    /**
     * @var \App\Models\Event $event
     */
@endphp

@extends('layouts.admin')
@section('title', 'イベント詳細: ' . $event->name)
@section('pageTitle', 'イベント詳細')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.events.view', ['event_id' => $event->id]) }}"
                   class="btn btn-sm btn-outline-danger delete-button"
                   data-delete-form="delete-form">
                    <i class="fa-solid fa-trash-can"></i> 削除
                </a>

                <form id="delete-form"
                      action="{{ route('admin.events.delete', ['event_id' => $event->id]) }}"
                      method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{ route('admin.events.update', ['event_id' => $event->id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 編集
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">イベント名</dt>
                        <dd class="col-sm-9">{{ $event->name }}</dd>
                        <dt class="col-sm-3">期間</dt>
                        <dd class="col-sm-9">
                            {{ $event->starts_at->format('Y/m/d') }} 〜 {{ $event->ends_at->format('Y/m/d') }}
                        </dd>
                        <dt class="col-sm-3">バナー</dt>
                        <dd class="col-sm-9">
                            @if(!empty($event->bannerCard))
                                {{ $event->bannerCard->card->member->display_name }}
                            @endif
                        </dd>
                        <dt class="col-sm-3">ユニット</dt>
                        <dd class="col-sm-9">
                            @if($event->unit_count === 1)
                                <span class="badge"
                                      style="background-color: {{ $event->eventMembers->first()->member->unit->bg_color }}; color: {{ $event->eventMembers->first()->member->unit->color }}">{{ $event->eventMembers->first()->member->unit->short }}</span>
                            @elseif($event->unit_count > 1)
                                混合
                            @else
                                未設定
                            @endif
                        </dd>
                        <dt class="col-sm-3">属性</dt>
                        <dd class="col-sm-9">{{ $event->attribute->description}}</dd>
                        <dt class="col-sm-3">タイプ</dt>
                        <dd class="col-sm-9">{{ $event->type->description}}</dd>
                        <dt class="col-sm-3">書き下ろし楽曲</dt>
                        <dd class="col-sm-9">
                            @if(!empty($event->tune))
                                {{ $event->tune->name}}
                            @endif
                        </dd>
                        <dt class="col-sm-3">イベントカード</dt>
                        <dd class="col-sm-9">
                            @foreach($event->eventCards as $eventCard)
                                @if($eventCard->card->normal_file)
                                    <img src="{{ route('admin.cards.display', ['card_id' => $eventCard->card->id, 'mode' => 'normal']) }}" width="50">
                                @else
                                    {{ $eventCard->card->display_name }}
                                @endif
                            @endforeach
                        </dd>
                        <dt class="col-sm-3">ボーナスメンバー</dt>
                        <dd class="col-sm-9">
                            @foreach($event->eventMembers as $eventMember)
                                @if(!empty($eventMember->member->icon))
                                    <img src="{{ route('admin.icons.display', ['icon_id' => $eventMember->member->icon->id]) }}"
                                         class="rounded-circle" style="width: 50px;">
                                @else
                                    {{ $eventMember->member->display_short }}
                                @endif
                            @endforeach
                        </dd>
                        <dt class="col-sm-3">ボーナス対象カード</dt>
                        <dd class="col-sm-9">
                            @foreach($event->bonus_cards as $bonusCard)
                                @if($bonusCard->normal_file)
                                    <img src="{{ route('admin.cards.display', ['card_id' => $bonusCard->id, 'mode' => 'normal']) }}" width="50">
                                @else
                                    {{ $bonusCard->display_name }}
                                @endif
                            @endforeach
                        </dd>


                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
