@php
    /**
     * @var \App\Models\Member $member
     * @var \App\Models\Unit[] $units
     */
@endphp

@extends('layouts.admin')
@section('title', 'メンバー作成')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div
                    class="card-header d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2 class="h5">メンバー作成</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.members.create') }}">
                        @csrf
                        @include('admin.members.form')

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
