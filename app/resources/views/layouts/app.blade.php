<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @hasSection('title')
        <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    @else
        <title>{{ config('app.name', 'Laravel') }}</title>
    @endif

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/front.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MW8ES70LY8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-MW8ES70LY8');
    </script>

    @hasSection('head')
        @yield('head')
    @endif
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"><i
                    class="fa-solid fa-snowflake"></i> {{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                    @if (Route::has('front.event-calc'))
                        @if ( Request::routeIs('front.event-calc') )
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('front.event-calc') }}">イベントボーナスポイント計算機 <i
                                        class="fa-solid fa-circle-chevron-left"></i></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.event-calc') }}">イベントボーナスポイント計算機</a>
                            </li>
                        @endif
                    @endif

                    @if (Route::has('front.character-sort'))
                        @if ( Request::routeIs('front.character-sort') )
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('front.character-sort') }}">キャラソート <i
                                        class="fa-solid fa-circle-chevron-left"></i></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.character-sort') }}">キャラソート</a>
                            </li>
                        @endif
                    @endif

                    @if (Route::has('front.interactions.index'))
                        @if ( Request::routeIs('front.interactions.*') )
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('front.interactions.index') }}">掛け合い <i
                                        class="fa-solid fa-circle-chevron-left"></i></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.interactions.index') }}">掛け合い</a>
                            </li>
                        @endif
                    @endif

                    @if (Route::has('front.reports.index'))
                        @if ( Request::routeIs('front.reports.*') )
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('front.reports.index') }}">集計 <i
                                        class="fa-solid fa-circle-chevron-left"></i></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('front.reports.index') }}">集計</a>
                            </li>
                        @endif
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>

        </div>
    </nav>
</header>

<main>
    <div id="page-move">
        <i id="page-top" class="fa-solid fa-circle-up"
           style="font-size: 2rem; position: fixed; bottom: 14%; right: 3%; cursor: pointer; z-index: 100;"></i>

        <i id="page-bottom" class="fa-solid fa-circle-down"
           style="font-size: 2rem; position: fixed; bottom: 5%; right: 3%; cursor: pointer; z-index: 100;"></i>
    </div>

    @yield('content')
</main>

<footer>
    <ul class="list-unstyled">
        <li>Twitter: @prsk_ts</li>
    </ul>
</footer>

</body>
</html>
