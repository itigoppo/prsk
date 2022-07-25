@php
    /**
     * @var \App\Models\Unit[] $units
     */
@endphp

@extends('layouts.admin')
@section('title', 'ユニット管理')
@section('pageTitle', 'ユニット一覧')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.units.create') }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 新規作成
                </a>
            </div>

            <div class="row">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ユニット名</th>
                        <th>短縮名</th>
                        <th>カラー</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($units as $unit)
                        <tr>
                            <td class="text-center">
                                <i class="fa-solid {{ $unit->is_active ? 'fa-microphone-lines' : 'fa-microphone-lines-slash' }}"></i>
                            </td>
                            <td>
                                {{ $unit->name }}
                            </td>
                            <td>
                                {{ $unit->short }}
                            </td>
                            <td>
                                    <span class="badge"
                                          style="background-color: {{ $unit->bg_color }}; color: {{ $unit->color }}">color</span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.units.view', ['unit_id' => $unit->id]) }}"
                                   class="btn btn-sm btn-outline-dark">詳細</a>
                                <a href="{{ route('admin.units.update', ['unit_id' => $unit->id]) }}"
                                   class="btn btn-sm btn-outline-primary">編集</a>
                                <a href="{{ route('admin.units.members.index', ['unit_id' => $unit->id]) }}"
                                   class="btn btn-sm btn-danger">メンバー</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

