@php
    /**
     * @var \App\Models\Member[] $members
     * @var int|null $unit_id
     */
@endphp

@extends('layouts.admin')
@section('title', 'メンバー管理')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="card">
                <div
                    class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h5">メンバー一覧</h2>
                    <div>
                        @if ( empty($unit_id) )
                            <a href="{{ route('admin.members.create') }}"
                               class="btn btn-sm btn-outline-primary">
                                作成
                            </a>
                        @else
                            <a href="{{ route('admin.units.members.create', ['unit_id' => $unit_id]) }}"
                               class="btn btn-sm btn-outline-primary">
                                作成
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">

                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>ユニット</th>
                            <th>アイコン</th>
                            <th>コード</th>
                            <th>メンバー名</th>
                            <th>短縮名</th>
                            <th>カラー</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td class="text-center">
                                    <i class="fa-solid {{ $member->is_active ? 'fa-microphone-lines' : 'fa-microphone-lines-slash' }}"></i>
                                </td>
                                <td>
                                    <span class="badge"
                                          style="background-color: {{ $member->unit->bg_color }}; color: {{ $member->unit->color }}">{{ $member->unit->short }}</span>

                                </td>
                                <td>
                                    @if(!empty($member->icon))
                                        <img src="{{ route('admin.icons.display', ['icon_id' => $member->icon->id]) }}"
                                             class="rounded-circle" style="width: 30px;">
                                    @endif
                                </td>
                                <td>
                                    {{ $member->code }}
                                </td>
                                <td>
                                    {{ $member->name }}
                                </td>
                                <td>
                                    {{ $member->short }}
                                </td>
                                <td>
                                    <span class="badge"
                                          style="background-color: {{ $member->bg_color }}; color: {{ $member->color }}">color</span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.units.members.view', ['member_id' => $member->id, 'unit_id' => $member->unit_id]) }}"
                                       class="btn btn-sm btn-outline-dark">詳細</a>
                                    <a href="{{ route('admin.units.members.update', ['member_id' => $member->id, 'unit_id' => $member->unit_id]) }}"
                                       class="btn btn-sm btn-outline-primary">編集</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

