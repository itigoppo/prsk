@php
    /**
     * @var \App\Models\VirtualLive $virtualLive
     */
@endphp

@extends('layouts.admin')
@section('title', 'バーチャルライブ編集: ' . $virtualLive->name)
@section('pageTitle', 'バーチャルライブ編集')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.lives.virtual.update', ['virtual_live_id' => $virtualLive->id]) }}">
                        @csrf
                        @include('admin.virtual-lives.form')

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
