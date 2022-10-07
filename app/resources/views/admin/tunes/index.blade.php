@php
    /**
     * @var \App\Models\Tune[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $tunes
     * @var array $search
     */
@endphp

@extends('layouts.admin')
@section('title', '楽曲管理')
@section('pageTitle', '楽曲一覧')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.tunes.create') }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 新規作成
                </a>
            </div>

            <div class="card mb-3">
                <div
                    class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-0 border-bottom">
                    <h3 class="h6">検索</h3>
                </div>
                <div class="card-body search">
                    <form method="GET" action="{{ route('admin.tunes.index') }}">
                        <div class="row mb-2">
                            <div class="form-group">
                                <label for="name" class="col-form-label text-md-end">楽曲名</label>
                                <input id="name" type="text"
                                       class="form-control" name="n"
                                       value="{{ !empty($search['n']) ? $search['n'] : '' }}">
                            </div>
                        </div>

                        <div class="row mb-0 mx-5">
                            <div class="col">
                                <a href="{{ route('admin.tunes.index') }}"
                                   class="btn btn-sm btn-outline-dark w-100">
                                    <i class="fa-solid fa-rotate"></i> リセット
                                </a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-sm w-100">
                                    <i class="fa-solid fa-magnifying-glass"></i> 検索
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>配信日</th>
                        <th>曲名</th>
                        <th>種別</th>
                        <th>ユニット名</th>
                        <th>MV</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tunes as $tune)
                        <tr>
                            <td>
                                {{ $tune->released_at->format('Y/m/d') }}
                            </td>
                            <td>
                                {{ $tune->name }}
                            </td>
                            <td>
                                {{ $tune->type->description }}
                            </td>
                            <td>
                                @if($tune->unit_id)
                                    <span class="badge"
                                          style="background-color: {{ $tune->unit->bg_color }}; color: {{ $tune->unit->color }}">{{ $tune->unit->short }}</span>
                                @else
                                    <span class="badge bg-info">その他</span>
                                @endif
                            </td>
                            <td>
                                @if($tune->has_3d_mv)
                                    <span class="badge bg-secondary">3D</span>
                                @endif
                                @if($tune->has_2d_mv)
                                    <span class="badge bg-warning">2D</span>
                                @endif
                                @if($tune->has_original_mv)
                                    <span class="badge bg-danger">原曲</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.tunes.view', ['tune_id' => $tune->id]) }}"
                                   class="btn btn-sm btn-outline-dark">詳細</a>
                                <a href="{{ route('admin.tunes.update', ['tune_id' => $tune->id]) }}"
                                   class="btn btn-sm btn-outline-primary">編集</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $tunes->links() }}
        </div>
    </div>
@endsection

