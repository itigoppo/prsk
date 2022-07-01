@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div id="play-image" class="carousel carousel-dark slide my-5 w-50 mx-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://pbs.twimg.com/media/FA48dZ_VkAESI99?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/FA5FX--VkAEfPsh?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/FA2vRS6VkAU6U2n?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/FA2vRS-UUAMCbaU?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/FA2vRTQUUAAkDCL?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/FA2vRT2UYAIm8k-?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/E_Z-w0zUUAEtP8V?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/FPO-qAiUcAEjpJA?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>
                <div class="carousel-item">
                    <img src="https://pbs.twimg.com/media/FPO03xEVgAQabcy?format=jpg&name=medium" class="d-block w-100"
                         alt="...">
                </div>

                <a class="carousel-control-prev" href="#play-image" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#play-image" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (Route::has('front.event-calc'))
                    <h3><a href="{{ route('front.event-calc') }}">イベントボーナスポイント計算機</a></h3>
                    <p>
                        特効簡易計算機。
                    </p>
                @endif

                @if (Route::has('front.character-sort'))
                    <h3><a href="{{ route('front.character-sort') }}">キャラソート</a></h3>
                    <p>
                        よくあるやつ。
                    </p>
                @endif

                @if (Route::has('front.cutins'))
                    <h3><a href="{{ route('front.cutins') }}">掛け合い一覧</a></h3>
                    <p>
                        わんわんーーーわんだほーーーい☆
                    </p>
                @endif

            </div>
        </div>
    </div>
@endsection
