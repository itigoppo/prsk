@php
    /**
     * @var \App\Models\Event $event
     */
@endphp

@extends('layouts.admin')
@section('title', 'イベント編集: ' . $event->name)
@section('pageTitle', 'イベント編集')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.events.update', ['event_id' => $event->id]) }}">
                        @csrf
                        @include('admin.events.form')

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
