@php
    /**
     * @var \App\Models\Tune $tune
     */
@endphp

@extends('layouts.admin')
@section('title', '楽曲詳細: ' . $tune->name)
@section('pageTitle', '楽曲詳細')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.tunes.view', ['tune_id' => $tune->id]) }}"
                   class="btn btn-sm btn-outline-danger delete-button"
                   data-delete-form="delete-form">
                    <i class="fa-solid fa-trash-can"></i> 削除
                </a>

                <form id="delete-form"
                      action="{{ route('admin.tunes.delete', ['tune_id' => $tune->id]) }}"
                      method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{ route('admin.tunes.update', ['tune_id' => $tune->id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 編集
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">配信日</dt>
                        <dd class="col-sm-9">{{ $tune->released_at->format('Y/m/d H:i:s') }}</dd>
                        <dt class="col-sm-3">楽曲名</dt>
                        <dd class="col-sm-9">{{ $tune->name }}</dd>
                        <dt class="col-sm-3">種別</dt>
                        <dd class="col-sm-9">{{ $tune->type->description }}</dd>
                        <dt class="col-sm-3">ユニット</dt>
                        <dd class="col-sm-9">
                            @if($tune->unit_id)
                                <span class="badge"
                                      style="background-color: {{ $tune->unit->bg_color }}; color: {{ $tune->unit->color }}">{{ $tune->unit->short }}</span>
                            @else
                                <span class="badge bg-info">その他</span>
                            @endif
                        </dd>
                        <dt class="col-sm-3">MV</dt>
                        <dd class="col-sm-9">
                            @if($tune->has_3d_mv)
                                <span class="badge badge-warning">3D</span>
                            @endif
                            @if($tune->has_2d_mv)
                                <span class="badge badge-success">2D</span>
                            @endif
                            @if($tune->has_original_mv)
                                <span class="badge badge-info">原曲</span>
                            @endif
                        </dd>
                        @if($tune->dancers->count() !== 0)
                            <dt class="col-sm-3">MV参加メンバー</dt>
                            <dd class="col-sm-9">
                                @foreach($tune->dancers as $dancer)

                                    <span class="badge me-2"
                                          @if(!empty($dancer->member))style="background-color: {{$dancer->member->bg_color}}; color: {{$dancer->member->color}}"@endif>
                                    {{ $dancer->member->display_short }}
                                    </span>
                                @endforeach
                            </dd>
                        @endif

                        @foreach($tune->singers_by_type as $key => $singers)
                            <dt class="col-sm-3">{{ \App\Enums\VocalType::getDescription(\Illuminate\Support\Str::before($key, '-')) }}</dt>
                            <dd class="col-sm-9">

                                @foreach($singers as $singer)
                                    <span class="badge me-2"
                                          @if(!empty($singer->member))style="background-color: {{$singer->member->bg_color}}; color: {{$singer->member->color}}"@endif>
                                    {{ $singer->member->display_short }}
                                    </span>
                                @endforeach
                            </dd>
                        @endforeach

                        <dt class="col-sm-3">楽曲難易度</dt>
                        <dd class="col-sm-9">
                            <table class="table table-sm table-striped">
                                <thead>
                                <tr>
                                    <th>EASY</th>
                                    <th>NORMAL</th>
                                    <th>HARD</th>
                                    <th>EXPERT</th>
                                    <th>MASTER</th>
                                    <th>APPEND</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $tune->easy_level }}</td>
                                    <td>{{ $tune->normal_level }}</td>
                                    <td>{{ $tune->hard_level }}</td>
                                    <td>{{ $tune->expert_level }}</td>
                                    <td>{{ $tune->master_level }}</td>
                                    <td>{{ $tune->append_level }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
