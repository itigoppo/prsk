@php
    /**
     * @var \App\Models\Interaction $interaction
     */
@endphp

@extends('layouts.admin')
@section('title', '掛け合い編集: '
. (!empty($interaction->fromMember) ? $interaction->fromMember->name . '('. $interaction->fromMember->unit->short . ')' : 'anyone')
. ' + '
. (!empty($interaction->toMember) ? $interaction->toMember->name . '('. $interaction->toMember->unit->short . ')' : 'anyone'))
@section('pageTitle', '掛け合い編集')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.interactions.update', ['interaction_id' => $interaction->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.interactions.form')

                        <div class="row mb-0 mx-5">
                            <button type="submit" class="btn btn-primary">
                                更新
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
