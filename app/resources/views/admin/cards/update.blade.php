@php
    /**
     * @var \App\Models\Card $card
     */
@endphp

@extends('layouts.admin')
@section('title', 'カード編集: [' . $card->name . ']' . $card->member->display_name)
@section('pageTitle', 'ユニット編集')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.cards.update', ['card_id' => $card->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.cards.form')

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
