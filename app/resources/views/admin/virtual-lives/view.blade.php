@php
    /**
     * @var \App\Models\VirtualLive $virtualLive
     */
@endphp

@extends('layouts.admin')
@section('title', 'バーチャルライブ詳細: ' . $virtualLive->name)
@section('pageTitle', 'バーチャルライブ詳細')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.lives.virtual.view', ['virtual_live_id' => $virtualLive->id]) }}"
                   class="btn btn-sm btn-outline-danger delete-button"
                   data-delete-form="delete-form">
                    <i class="fa-solid fa-trash-can"></i> 削除
                </a>

                <form id="delete-form"
                      action="{{ route('admin.lives.virtual.delete', ['virtual_live_id' => $virtualLive->id]) }}"
                      method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{ route('admin.lives.virtual.update', ['virtual_live_id' => $virtualLive->id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 編集
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">バーチャルライブ名</dt>
                        <dd class="col-sm-9">{{ $virtualLive->name }}</dd>
                        <dt class="col-sm-3">期間</dt>
                        <dd class="col-sm-9">
                            {{ $virtualLive->starts_at->format('Y/m/d') }} 〜 {{ $virtualLive->ends_at->format('Y/m/d') }}
                        </dd>
                        <dt class="col-sm-3">参加メンバー</dt>
                        <dd class="col-sm-9">
                            @foreach($virtualLive->virtualLiveMembers as $virtualLiveMember)
                                @if(!empty($virtualLiveMember->member->icon))
                                    <img src="{{ route('admin.icons.display', ['icon_id' => $virtualLiveMember->member->icon->id]) }}"
                                         class="rounded-circle" style="width: 50px;">
                                @else
                                    {{ $virtualLiveMember->member->display_short }}
                                @endif
                            @endforeach
                        </dd>
                        <dt class="col-sm-3">セトリ</dt>
                        <dd class="col-sm-9">
                            <ul>
                            @foreach($virtualLive->virtualLiveTunes as $virtualLiveTune)
                                <li>{{ $virtualLiveTune->tune->name }}</li>
                            @endforeach
                            </ul>
                        </dd>

                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
