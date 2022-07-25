@php
    /**
     * @var \App\Models\Tune $tune
     * @var \App\Models\Unit[] $units
     */
@endphp

@extends('layouts.admin')
@section('title', '楽曲編集: ' . $tune->name)
@section('pageTitle', '楽曲編集')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.tunes.update', ['tune_id' => $tune->id]) }}">
                        @csrf
                        @include('admin.tunes.form')

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
