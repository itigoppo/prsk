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
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">

                        {{ __('You are welcome!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
