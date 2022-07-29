@extends('layouts.admin')
@section('title', 'カード作成')
@section('pageTitle', 'カード作成')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.cards.create') }}" enctype="multipart/form-data">
                        @csrf
                        @include('admin.cards.form')

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
