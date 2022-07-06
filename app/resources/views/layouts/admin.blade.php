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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @hasSection('head')
        @yield('head')
    @endif
</head>
<body>

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm fixed-top d-flex flex-row">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.home') }}"><i
                    class="fa-solid fa-snowflake"></i> {{ config('app.name', 'Laravel') }}</a>

            <div id="navbar-menu-wrapper" class="d-flex align-items-center justify-content-end">
                <ul class="navbar-nav mx-2">
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
                            <a id="nav-profile" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" data-bs-display="static" aria-haspopup="true"
                               aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="nav-profile">
                                <div class="dropdown-item">
                                    {{ Auth::user()->role->description }}
                                </div>
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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar"
                        aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </nav>
</header>

<div id="page-body-wrapper" class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse pt-3">
            <div class="position-sticky">
                <ul class="nav nav-pills flex-column mb-auto">
                    @if ( Request::routeIs('admin.home') )
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">
                                <i class="fa-solid fa-dashboard"></i>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home') }}">
                                <i class="fa-solid fa-dashboard"></i>
                                <span class="ml-2">Dashboard</span>
                            </a>
                        </li>
                    @endif

                    @can('isAdmin')
                        @if ( Request::routeIs('admin.units.*') && !Request::routeIs('admin.units.members.*') )
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('admin.units.index') }}">
                                    <i class="fa-solid fa-users"></i>
                                    <span class="ml-2">ユニット管理</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.units.index') }}">
                                    <i class="fa-solid fa-users"></i>
                                    <span class="ml-2">ユニット管理</span>
                                </a>
                            </li>
                        @endif

                        @if ( Request::routeIs('admin.members.*') || Request::routeIs('admin.units.members.*') )
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                   href="{{ route('admin.members.index') }}">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="ml-2">メンバー管理</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.members.index') }}">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="ml-2">メンバー管理</span>
                                </a>
                            </li>
                        @endif

                        @if ( Request::routeIs('admin.icons.*') )
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('admin.icons.index') }}">
                                    <i class="fa-solid fa-file-image"></i>
                                    <span class="ml-2">アイコン管理</span>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.icons.index') }}">
                                    <i class="fa-solid fa-file-image"></i>
                                    <span class="ml-2">アイコン管理</span>
                                </a>
                            </li>
                        @endif

                        @if ( Request::routeIs('admin.interactions.*') )

                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-bs-toggle="collapse"
                                   data-bs-target="#interactions-collapse"
                                   aria-expanded="true" aria-controls="interactions-collapse">
                                    <i class="fa-regular fa-comments"></i>
                                    <span class="menu-title">掛け合い管理</span>
                                    <i class="menu-arrow fa-lg fa-pull-right"></i>
                                </a>
                                <div class="collapse show" id="interactions-collapse">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.interactions.index') }}">
                                                <i class="fa-solid fa-list"></i> 掛け合い一覧
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.interactions.logs.index') }}">
                                                <i class="fa-solid fa-rss"></i> 更新履歴
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#interactions-collapse"
                                   aria-expanded="false" aria-controls="interactions-collapse">
                                    <i class="fa-regular fa-comments"></i>
                                    <span class="menu-title">掛け合い管理</span>
                                    <i class="menu-arrow fa-lg fa-pull-right"></i>
                                </a>
                                <div class="collapse" id="interactions-collapse">
                                    <ul class="nav flex-column sub-menu">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.interactions.index') }}">
                                                <i class="fa-solid fa-list"></i> 掛け合い一覧
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.interactions.logs.index') }}">
                                                <i class="fa-solid fa-rss"></i> 更新履歴
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif

                    @endcan
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
            <div id="page-move">
                <i id="page-top" class="fa-solid fa-circle-up"
                   style="font-size: 2rem; position: fixed; bottom: 14%; right: 3%; cursor: pointer; z-index: 100;"></i>

                <i id="page-bottom" class="fa-solid fa-circle-down"
                   style="font-size: 2rem; position: fixed; bottom: 5%; right: 3%; cursor: pointer; z-index: 100;"></i>
            </div>

            <div class="content-wrapper">
                <div class="page-title mb-3">
                    @hasSection('pageTitle')
                        <h2 class="h5">@yield('pageTitle')</h2>
                    @endif
                    @if ( !Request::routeIs('admin.home') )
                        {{ Breadcrumbs::render(Route::currentRouteName(), $breadcrumbs ?? '') }}
                    @endif
                </div>

                @yield('content')
            </div>
        </main>
    </div>
</div>

</body>
</html>
