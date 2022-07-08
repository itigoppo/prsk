@php
    /**
     * @var \App\Models\Interaction $interaction
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

                <div class="bs-component">

                    <div class="modal" id="play-modal" tabindex="-1" aria-hidden="false">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <span @class(['badge', 'me-2', 'bg-dark' => empty($interaction->fromMember)])
                                              @if(!empty($interaction->fromMember))style="background-color: {{$interaction->fromMember->bg_color}}; color: {{$interaction->fromMember->color}}"@endif>
                                        {{ (!empty($interaction->fromMember) ? $interaction->fromMember->display_short : 'anyone') }}
                                        </span>
                                        ×
                                        <span @class(['badge', 'me-2', 'bg-dark' => empty($interaction->toMember)])
                                              @if(!empty($interaction->toMember))style="background-color: {{$interaction->toMember->bg_color}}; color: {{$interaction->toMember->color}}"@endif>
                                        {{ (!empty($interaction->toMember) ? $interaction->toMember->display_short : 'anyone') }}
                                        </span>
                                    </h5>
                                </div>

                                <div class="modal-body">
                                    <div class="card m-2">
                                        <div class="card-body px-4">
                                            @include('front.interactions.lookup')
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">

                                    <a href="{{ route('front.interactions.index') }}"
                                       class="btn btn-primary">&laquo; go list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
