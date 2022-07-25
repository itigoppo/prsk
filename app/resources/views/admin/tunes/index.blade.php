@php
    /**
     * @var \App\Models\Tune[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $tunes
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

