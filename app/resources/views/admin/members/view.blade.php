@php
    /**
     * @var \App\Models\Member $member
     */
@endphp

@extends('layouts.admin')
@section('title', 'メンバー詳細: ' . $member->name)
@section('pageTitle', 'メンバー詳細')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')


            <div class="text-end mb-2">
                <a href="{{ route('admin.units.members.view', ['member_id' => $member->id, 'unit_id' => $member->unit_id]) }}"
                   class="btn btn-sm btn-outline-danger delete-button"
                   data-delete-form="delete-form">
                    <i class="fa-solid fa-trash-can"></i> 削除
                </a>

                <form id="delete-form"
                      action="{{ route('admin.units.members.delete', ['member_id' => $member->id, 'unit_id' => $member->unit_id]) }}"
                      method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{ route('admin.units.members.update', ['member_id' => $member->id, 'unit_id' => $member->unit_id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 編集
                </a>
            </div>

            <div class="card">

                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ユニット</dt>
                        <dd class="col-sm-9">{{ $member->unit->name }}</dd>
                        <dt class="col-sm-3">アイコン</dt>
                        <dd class="col-sm-9">
                            @if(!empty($member->icon))
                                <img src="{{ route('admin.icons.display', ['icon_id' => $member->icon->id]) }}" class="rounded-circle"
                                     style="width: 150px;">
                            @endif
                        </dd>
                        <dt class="col-sm-3">メンバーコード</dt>
                        <dd class="col-sm-9">{{ $member->code }}</dd>
                        <dt class="col-sm-3">メンバー名</dt>
                        <dd class="col-sm-9">{{ $member->name }}</dd>
                        <dt class="col-sm-3">短縮名</dt>
                        <dd class="col-sm-9">{{ $member->short }}</dd>
                        <dt class="col-sm-3">メンバーカラー</dt>
                        <dd class="col-sm-9">{{ $member->bg_color }}</dd>
                        <dt class="col-sm-3">テキストカラー</dt>
                        <dd class="col-sm-9">{{ $member->color }}</dd>
                        <dt class="col-sm-3">有効/無効</dt>
                        <dd class="col-sm-9">{{ $member->active_label }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
