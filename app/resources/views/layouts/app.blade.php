<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  @hasSection('title')
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
  @else
    <title>{{ config('app.name', 'Laravel') }}</title>
  @endif

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])

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

  @if (isset($script))
    {{ $script }}
  @endif
</head>

<body class="font-sans antialiased">
  <x-toast />

  <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
      <header>
        <div class="mx-auto max-w-7xl py-4 sm:px-6 lg:px-8">
          {{ $header }}
        </div>
      </header>
    @endif

    <!-- Page Content -->
    <main>
      {{ $slot }}

      <div x-cloak x-data="{ scroll: false }"
        @scroll.window="document.documentElement.scrollTop > 20 ? scroll = true : scroll = false" x-show="scroll"
        @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-20 right-3 z-10 cursor-pointer transition duration-150 ease-in-out" x-transition.opacity>
        <div class="flex h-12 w-12 flex-col items-center justify-center rounded-full bg-gray-500">
          <span class="mt-2 h-4 w-4 rotate-45 border-l-2 border-t-2 border-white"></span>
        </div>
      </div>

      <div x-cloak x-data="{ scroll: false }"
        @scroll.window="document.documentElement.scrollTop > 20 ? scroll = true : scroll = false" x-show="scroll"
        @click="window.scrollTo({top: document.documentElement.scrollHeight, behavior: 'smooth'})"
        class="fixed bottom-5 right-3 z-10 cursor-pointer transition duration-150 ease-in-out" x-transition.opacity>
        <div class="flex h-12 w-12 flex-col items-center justify-center rounded-full bg-gray-500">
          <span class="mb-2 h-4 w-4 rotate-45 border-b-2 border-r-2 border-white"></span>
        </div>
      </div>
    </main>

    <footer class="mt-2 pb-10 text-center text-xs">
      &copy {{ now()->year }} <a href="https://twitter.com/itigoppo" target="_brank">Hisato S.</a>
    </footer>
  </div>
</body>

</html>
