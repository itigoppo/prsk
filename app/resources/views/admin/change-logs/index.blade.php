@php
    /**
     * @var \App\Models\ChangeLog[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $changeLogs
     * @var \App\Enums\ChangeLogType $changeLogType
     * @var string $route
     */
@endphp

@extends('layouts.admin')
@section('title', $changeLogType->description . '更新履歴')
@section('pageTitle', $changeLogType->description . '更新履歴')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route($route . 'create') }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 新規作成
                </a>
            </div>

            <div class="row">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>更新日</th>
                        <th>更新内容</th>
                        <th style="width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($changeLogs as $changeLog)
                        <tr>
                            <td>
                                {{ $changeLog->released_at->format('Y/m/d') }}
                            </td>
                            <td>
                                {!! nl2br(e($changeLog->note)) !!}
                            </td>
                            <td class="text-end">
                                <a href="{{ route($route . 'view', ['change_log_id' => $changeLog->id]) }}"
                                   class="btn btn-sm btn-outline-dark">詳細</a>
                                <a href="{{ route($route . 'update', ['change_log_id' => $changeLog->id]) }}"
                                   class="btn btn-sm btn-outline-primary">編集</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $changeLogs->links() }}
        </div>
    </div>
@endsection

