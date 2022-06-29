@php
    /**
     * @var \App\Models\Unit $unit
     */
@endphp

@extends('layouts.admin')
@section('title', 'ユニット詳細: ' . $unit->name)

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="card">
                <div
                    class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h5">ユニット詳細</h2>
                    <div>
                        <a href="{{ route('admin.units.update', ['unit_id' => $unit->id]) }}"
                           class="btn btn-sm btn-outline-primary">
                            編集
                        </a>

                        <a href="{{ route('admin.units.view', ['unit_id' => $unit->id]) }}"
                           class="btn btn-sm btn-outline-danger"
                           onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                            削除
                        </a>

                        <form id="delete-form" action="{{ route('admin.units.delete', ['unit_id' => $unit->id]) }}"
                              method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

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
