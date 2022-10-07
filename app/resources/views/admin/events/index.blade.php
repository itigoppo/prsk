@php
    /**
     * @var \App\Models\Event[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $events
     */
@endphp

@extends('layouts.admin')
@section('title', 'イベント管理')
@section('pageTitle', 'イベント一覧')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.events.create') }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 新規作成
                </a>
            </div>

            <div class="row">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>バナー</th>
                        <th>イベント名</th>
                        <th>期間</th>
                        <th>ユニット</th>
                        <th>属性</th>
                        <th>タイプ</th>
                        <th style="width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>
                                @if(!empty($event->bannerCard->card->member->icon))
                                    <img src="{{ route('admin.icons.display', ['icon_id' => $event->bannerCard->card->member->icon->id]) }}"
                                         class="rounded-circle" style="width: 40px;">
                                @else
                                    {{ $event->bannerCard->card->member->display_short }}
                                @endif
                            </td>
                            <td>
                                {{ $event->name }}
                            </td>
                            <td>
                                {{ $event->starts_at->format('Y/m/d') }} 〜 {{ $event->ends_at->format('Y/m/d') }}
                                ({{ $event->starts_at->diffInDays($event->ends_at) }})
                            </td>
                            <td>
                                @if($event->unit_count === 1)
                                    <span class="badge"
                                          style="background-color: {{ $event->eventMembers->first()->member->unit->bg_color }}; color: {{ $event->eventMembers->first()->member->unit->color }}">{{ $event->eventMembers->first()->member->unit->short }}</span>
                                @elseif($event->unit_count > 1)
                                    混合
                                @else
                                    未設定
                                @endif
                            </td>
                            <td>
                                {{ $event->attribute->description}}
                            </td>
                            <td>
                                {{ $event->type->description}}
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.events.view', ['event_id' => $event->id]) }}"
                                   class="btn btn-sm btn-outline-dark">詳細</a>
                                <a href="{{ route('admin.events.update', ['event_id' => $event->id]) }}"
                                   class="btn btn-sm btn-outline-primary">編集</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $events->links() }}
        </div>
    </div>
@endsection

