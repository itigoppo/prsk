@php
    /**
     * @var \App\Models\Icon[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $icons
     */
@endphp
@extends('layouts.admin')
@section('title', 'アイコン管理')
@section('pageTitle', 'アイコン管理')

@section('head')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection

@section('content')
    <div class="row justify-content-center">

        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.icons.upload') }}" class="dropzone" id="icon-dropzone"
                          data-show-url="{{ route('admin.icons.lookup') }}">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-10 my-3" id="icon-show">
            @include('admin.icons.lookup')
        </div>

    </div>
@endsection

