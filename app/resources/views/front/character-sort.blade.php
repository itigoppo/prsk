@extends('layouts.app')

@section('title', 'キャラソート')

@section('head')
    <script src="{{ asset('js/character-sort.js') }}"></script>
@endsection

@section('content')

    <div class="container-fluid">
        <div id="battle-number" class="alert alert-secondary my-2 w-50 mx-auto">
        </div>

        <div class="w-50 mx-auto text-center">
            好きな方（または引き分け）を選択してください。

            <div class="progress my-2">
                <div id="result-progress" class="progress-bar progress-bar-striped bg-info" role="progressbar"
                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <a class="btn btn-secondary btn-sm" href="{{ route('front.character-sort') }}">やり直す</a>
        </div>

        <div class="row my-2 mx-5 align-items-center">
            <div class="col-md-5 col-sm-12">
                <div id="left-field" class="card" style="cursor: pointer"></div>
            </div>
            <div class="col-md-2 col-sm-12 my-3">
                <div id="middle-field" class="card text-center" style="cursor: pointer">
                    <p class="card-text">引き分け</p>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div id="right-field" class="card" style="cursor: pointer"></div>
            </div>
        </div>

        <div class="mx-5" id="result-field">
        </div>
    </div>

@endsection
