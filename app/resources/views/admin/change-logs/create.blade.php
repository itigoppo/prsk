@php
    /**
     * @var \App\Enums\ChangeLogType $changeLogType
     */
@endphp

@extends('layouts.admin')
@section('title', $changeLogType->description . '更新履歴作成')
@section('pageTitle', $changeLogType->description . '更新履歴作成')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.interactions.logs.create') }}">
                        @csrf
                        @include('admin.change-logs.form')

                        <div class="row mb-0 mx-5">
                            <button type="submit" class="btn btn-primary">
                                登録
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
