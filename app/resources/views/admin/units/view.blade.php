@php
    /**
     * @var \App\Models\Unit $unit
     */
@endphp

@extends('layouts.admin')
@section('title', 'ユニット詳細: ' . $unit->name)
@section('pageTitle', 'ユニット詳細')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.units.view', ['unit_id' => $unit->id]) }}"
                   class="btn btn-sm btn-outline-danger delete-button"
                   data-delete-form="delete-form">
                    <i class="fa-solid fa-trash-can"></i> 削除
                </a>

                <form id="delete-form"
                      action="{{ route('admin.units.delete', ['unit_id' => $unit->id]) }}"
                      method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{ route('admin.units.update', ['unit_id' => $unit->id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 編集
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ユニット名</dt>
                        <dd class="col-sm-9">{{ $unit->name }}</dd>
                        <dt class="col-sm-3">短縮名</dt>
                        <dd class="col-sm-9">{{ $unit->short }}</dd>
                        <dt class="col-sm-3">ユニットカラー</dt>
                        <dd class="col-sm-9">{{ $unit->bg_color }}</dd>
                        <dt class="col-sm-3">テキストカラー</dt>
                        <dd class="col-sm-9">{{ $unit->color }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
