@php
    /**
     * @var \App\Models\Unit $unit
     */
@endphp

@extends('layouts.admin')
@section('title', 'ユニット編集: ' . $unit->name)
@section('pageTitle', 'ユニット編集')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.units.update', ['unit_id' => $unit->id]) }}">
                        @csrf
                        @include('admin.units.form')

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
