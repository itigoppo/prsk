@php
    /**
     * @var \App\Models\Interaction[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $interactions
     * @var \App\Models\Unit[] $units
     * @var array $search
     * @var @var \App\Models\ChangeLog[] $changeLogs
     */
@endphp

@extends('layouts.app')
@section('title', '掛け合い')

@section('head')
    <script src="{{ asset('js/interactions.js') }}"></script>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="my-2">
                    <button class="btn btn-sm btn-outline-info rounded-pill" data-bs-toggle="modal" data-bs-target="#change-logs-modal">
                        <i class="fa-solid fa-clock-rotate-left"></i> 更新履歴
                    </button>

                    <button class="btn btn-sm btn-outline-info rounded-pill" type="button" data-bs-toggle="collapse"
                            data-bs-target="#search-collapse" aria-expanded="false" aria-controls="search-collapse">
                        <i class="fa-solid fa-magnifying-glass"></i> 絞り込み
                    </button>
                </div>

                <div id="search-collapse" class="collapse">
                    <div class="card my-3">
                        <div class="card-body search">

                            <form method="GET" action="{{ route('front.interactions.index') }}">
                                <div class="row mb-2">
                                    <div class="icheck-primary">
                                        <input id="wonder" class="form-check-input" type="checkbox" name="wdh"
                                               value="1"{{ !empty($search['wdh']) ? ' checked' : '' }} />
                                        <label for="wonder"><i
                                                class="fa-solid fa-child-reaching fa-bounce text-warning"></i> わんだほーい <i
                                                class="fa-solid fa-splotch fa-flip fa-2xs text-warning"></i></label>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="from-member-ids"
                                                   class="col-form-label text-md-end">応メンバー</label>
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

                                <div class="row mb-0 mx-5">
                                    <div class="col">
                                        <a href="{{ route('front.interactions.index') }}"
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
                </div>


                <div>
                    <table class="table table-sm table-striped table-hover">
                        <thead class="table-light text-center">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 49%">From</th>
                            <th scope="col" style="width: 49%">To</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($interactions as $interaction)
                            <tr>
                                <td>
                                    <button class="btn btn-sm btn-outline-success" data-bs-toggle="modal"
                                            data-bs-target="#play-modal"
                                            data-interaction-url="{{ route('front.interactions.lookup', ['interaction_id' => $interaction->uuid]) }}">
                                        <i class="fa-solid fa-music"></i>
                                    </button>
                                </td>
                                <td>
                                    <span @class(['badge', 'me-2', 'bg-dark' => empty($interaction->fromMember)])
                                          @if(!empty($interaction->fromMember))style="background-color: {{$interaction->fromMember->bg_color}}; color: {{$interaction->fromMember->color}}"@endif>
                                    {{ (!empty($interaction->fromMember) ? $interaction->fromMember->display_short : 'anyone') }}
                                    </span>

                                    {{ (!empty($interaction->from_line) ? $interaction->from_line : '-') }}
                                </td>
                                <td>
                                    <span @class(['badge', 'me-2', 'bg-dark' => empty($interaction->toMember)])
                                          @if(!empty($interaction->toMember))style="background-color: {{$interaction->toMember->bg_color}}; color: {{$interaction->toMember->color}}"@endif>
                                    {{ (!empty($interaction->toMember) ? $interaction->toMember->display_short : 'anyone') }}
                                    </span>

                                    {{ (!empty($interaction->to_line) ? $interaction->to_line : '-') }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

                {{ $interactions->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="play-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-end mx-2 mt-2">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="card m-2">
                        <div class="card-body px-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="change-logs-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-clock-rotate-left"></i> 更新履歴</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>

                <div class="modal-body">
                    <dl class="row">
                        @foreach($changeLogs as $changeLog)
                            <dt class="col-3 text-end">{{ $changeLog->released_at->format('Y/m/d') }}</dt>
                            <dd class="col-9">
                                {!! nl2br(e($changeLog->note)) !!}
                            </dd>
                        @endforeach
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
