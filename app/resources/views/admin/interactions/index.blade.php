@php
    /**
     * @var \App\Models\Interaction[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $interactions
     * @var \App\Models\Unit[] $units
     * @var array $search
     */
@endphp

@extends('layouts.admin')
@section('title', '掛け合い管理')
@section('pageTitle', '掛け合い一覧')

@section('head')
    <script src="{{ asset('js/interactions.js') }}"></script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.interactions.create') }}"
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
                    <form method="GET" action="{{ route('admin.interactions.index') }}">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="form-group">
                                    <label for="from-member-ids" class="col-form-label text-md-end">応メンバー</label>
                                    <select id="from-member-ids" class="form-select" name="fmids[]"
                                            multiple="multiple">
                                        @foreach($units as $unit)
                                            <optgroup label="{{ $unit->name }}">
                                                @foreach($unit->members as $member)
                                                    <option
                                                        value="{{ $member->id }}"
                                                        {{ !empty($search['fmids']) && (in_array($member->id, $search['fmids'])) ? ' selected' : '' }}
                                                        data-color="{{ $member->color }}"
                                                        data-bg-color="{{ $member->bg_color }}"
                                                        data-name="{{ $member->display_short }}"
                                                    >{{ $member->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="to-member-ids" class="col-form-label text-md-end">答メンバー</label>
                                    <select id="to-member-ids" class="form-select" name="tmids[]"
                                            multiple="multiple">
                                        @foreach($units as $unit)
                                            <optgroup label="{{ $unit->name }}">
                                                @foreach($unit->members as $member)
                                                    <option
                                                        value="{{ $member->id }}"
                                                        {{ !empty($search['tmids']) && (in_array($member->id, $search['tmids'])) ? ' selected' : '' }}
                                                        data-color="{{ $member->color }}"
                                                        data-bg-color="{{ $member->bg_color }}"
                                                        data-name="{{ $member->display_short }}"
                                                    >{{ $member->name }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div>
                                <div class="radio icheck-success icheck-inline">
                                    <input type="radio" id="has-file-0" name="hasf"
                                           value="0"{{ empty($search['hasf']) ? ' checked' : '' }}>
                                    <label for="has-file-0">ファイルチェックなし</label>
                                </div>
                                <div class="radio icheck-success icheck-inline">
                                    <input type="radio" id="has-file-1" name="hasf"
                                           value="1"{{ !empty($search['hasf']) && $search['hasf'] === '1' ? ' checked' : '' }}>
                                    <label for="has-file-1">ファイルあり</label>
                                </div>
                                <div class="radio icheck-success icheck-inline">
                                    <input type="radio" id="has-file-2" name="hasf"
                                           value="2"{{ !empty($search['hasf']) && $search['hasf'] === '2' ? ' checked' : '' }}>
                                    <label for="has-file-2">ファイルなし</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0 mx-5">
                            <div class="col">
                                <a href="{{ route('admin.interactions.index') }}"
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
                        <th>音</th>
                        <th>応</th>
                        <th>答</th>
                        <th style="width: 200px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($interactions as $interaction)
                        <tr>
                            <td>
                                @if(!empty($interaction->file))
                                    <span class="fa-stack">
                                        <i class="fa-solid fa-circle fa-stack-2x text-danger"></i>
                                        <i class="fa-solid fa-music fa-stack-1x fa-inverse"></i>
                                      </span>
                                @endif
                            </td>
                            <td>
                                    <span @class(['badge', 'me-2', 'badge-dark' => empty($interaction->fromMember)])
                                          @if(!empty($interaction->fromMember))style="background-color: {{$interaction->fromMember->bg_color}}; color: {{$interaction->fromMember->color}}"@endif>
                                    {{ (!empty($interaction->fromMember) ? $interaction->fromMember->display_short : 'anyone') }}
                                    </span>

                                {{ (!empty($interaction->from_line) ? $interaction->from_line : '-') }}
                            </td>
                            <td>
                                    <span @class(['badge', 'me-2', 'badge-dark' => empty($interaction->toMember)])
                                          @if(!empty($interaction->toMember))style="background-color: {{$interaction->toMember->bg_color}}; color: {{$interaction->toMember->color}}"@endif>
                                    {{ (!empty($interaction->toMember) ? $interaction->toMember->display_short : 'anyone') }}
                                    </span>

                                {{ (!empty($interaction->to_line) ? $interaction->to_line : '-') }}
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.interactions.view', ['interaction_id' => $interaction->id]) }}"
                                   class="btn btn-sm btn-outline-dark">詳細</a>
                                <a href="{{ route('admin.interactions.update', ['interaction_id' => $interaction->id]) }}"
                                   class="btn btn-sm btn-outline-primary">編集</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $interactions->links() }}
        </div>
    </div>
@endsection

