@php
    /**
     * @var \App\Models\ChangeLog $changeLog
     * @var \App\Enums\ChangeLogType $changeLogType
     * @var string $route
     */
@endphp

@extends('layouts.admin')
@section('title', $changeLogType->description . '更新履歴詳細: ' . $changeLog->released_at->format('Y/m/d'))
@section('pageTitle', $changeLogType->description . '更新履歴詳細')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route($route . 'view', ['change_log_id' => $changeLog->id]) }}"
                   class="btn btn-sm btn-outline-danger delete-button"
                   data-delete-form="delete-form">
                    <i class="fa-solid fa-trash-can"></i> 削除
                </a>

                <form id="delete-form"
                      action="{{ route($route . 'delete', ['change_log_id' => $changeLog->id]) }}"
                      method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{ route($route . 'update', ['change_log_id' => $changeLog->id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 編集
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">更新日</dt>
                        <dd class="col-sm-9">{{ $changeLog->released_at->format('Y/m/d') }}</dd>
                        <dt class="col-sm-3">更新内容</dt>
                        <dd class="col-sm-9">{!! nl2br(e($changeLog->note)) !!}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
