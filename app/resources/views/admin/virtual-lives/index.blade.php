@php
    /**
     * @var \App\Models\VirtualLive[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $virtualLives
     */
@endphp

@extends('layouts.admin')
@section('title', 'バーチャルライブ管理')
@section('pageTitle', 'バーチャルライブ一覧')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.lives.virtual.create') }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 新規作成
                </a>
            </div>

            <div class="row">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>バーチャルライブ名</th>
                        <th>期間</th>
                        <th>イベント</th>
                        <th style="width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($virtualLives as $virtualLive)
                        <tr>
                            <td>
                                {{ $virtualLive->name }}
                            </td>
                            <td>
                                {{ $virtualLive->starts_at->format('Y/m/d') }} 〜 {{ $virtualLive->ends_at->format('Y/m/d') }}
                            </td>
                            <td>
                                @if(!empty($virtualLive->event))
                                    {{ $virtualLive->event->name }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.lives.virtual.view', ['virtual_live_id' => $virtualLive->id]) }}"
                                   class="btn btn-sm btn-outline-dark">詳細</a>
                                <a href="{{ route('admin.lives.virtual.update', ['virtual_live_id' => $virtualLive->id]) }}"
                                   class="btn btn-sm btn-outline-primary">編集</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $virtualLives->links() }}
        </div>
    </div>
@endsection

