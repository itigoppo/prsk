@php
    /**
     * @var \App\Models\Interaction $interaction
     */
@endphp

@extends('layouts.admin')
@section('title', '掛け合い詳細: '
. (!empty($interaction->fromMember) ? $interaction->fromMember->display_name : 'anyone')
. ' + '
. (!empty($interaction->toMember) ? $interaction->toMember->display_name : 'anyone'))
@section('pageTitle', '掛け合い詳細')

@section('head')
    <script src="{{ asset('js/interactions.js') }}"></script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.interactions.view', ['interaction_id' => $interaction->id]) }}"
                   class="btn btn-sm btn-outline-danger delete-button"
                   data-delete-form="delete-form">
                    <i class="fa-solid fa-trash-can"></i> 削除
                </a>

                <form id="delete-form"
                      action="{{ route('admin.interactions.delete', ['interaction_id' => $interaction->id]) }}"
                      method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{ route('admin.interactions.update', ['interaction_id' => $interaction->id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 編集
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">応メンバー</dt>
                        <dd class="col-sm-9">{{ (!empty($interaction->fromMember) ? $interaction->fromMember->display_name : '') }}</dd>
                        <dt class="col-sm-3">応セリフ</dt>
                        <dd class="col-sm-9">{{ $interaction->from_line }}</dd>
                        <dt class="col-sm-3">応メンバー</dt>
                        <dd class="col-sm-9">{{ (!empty($interaction->toMember) ? $interaction->toMember->display_name : '') }}</dd>
                        <dt class="col-sm-3">応セリフ</dt>
                        <dd class="col-sm-9">{{ $interaction->to_line }}</dd>
                        <dt class="col-sm-3">備考</dt>
                        <dd class="col-sm-9">{{ $interaction->note }}</dd>
                        <dt class="col-sm-3">ファイル</dt>
                        <dd class="col-sm-9">
                            @if(!empty($interaction->file))
                                <audio controls="" controlslist="nodownload" id="audio-file">
                                    <source
                                        src="{{ route('admin.interactions.display', ['interaction_id' => $interaction->id]) }}"
                                        type="audio/mpeg">
                                </audio>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
