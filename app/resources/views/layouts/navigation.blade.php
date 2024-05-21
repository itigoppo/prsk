<nav x-data="{ open: false }" @class([
    'border-b',
    'border-gray-100',
    'dark:border-gray-700',
    'dark:bg-gray-800',
    'bg-puerto-rico-300' => Auth::check(),
    'bg-azure-600' => Auth::guest(),
])>
  <!-- Primary Navigation Menu -->
  <div class="mx-auto max-w-7xl px-4 md:px-6 lg:px-8">
    <div class="flex h-12 justify-between">
      <div class="flex">
        <!-- Logo -->
        <div class="flex shrink-0 items-center">
          <a href="/" class="flex items-center gap-x-2">
            <x-application-logo type="rounded" opticalSize="24" class="text-white" />
            <div class="font-semibold text-white">
              {{ config('app.name', 'Laravel') }}
            </div>
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-2 md:-my-px md:ms-10 md:flex">
          @auth
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
              {{ __('Dashboard') }}
            </x-nav-link>

            @if (Route::has('admin.units.index'))
              <x-nav-link :href="route('admin.units.index')" :active="request()->routeIs('admin.units.*') && !request()->routeIs('admin.units.members.*')">
                ユニット管理
              </x-nav-link>
            @endif

            @if (Route::has('admin.members.index'))
              <x-nav-link :href="route('admin.members.index')" :active="request()->routeIs('admin.members.*') || request()->routeIs('admin.units.members.*')">
                メンバー管理
              </x-nav-link>
            @endif

            @if (Route::has('admin.icons.index'))
              <x-nav-link :href="route('admin.icons.index')" :active="request()->routeIs('admin.icons.*')">
                アイコン管理
              </x-nav-link>
            @endif

            @if (Route::has('admin.dialogues.index'))
              <x-nav-link :href="route('admin.dialogues.index')" :active="request()->routeIs('admin.dialogues.*')">
                掛け合い管理
              </x-nav-link>
            @endif

            @if (Route::has('admin.tunes.index'))
              <x-nav-link :href="route('admin.tunes.index')" :active="request()->routeIs('admin.tunes.*')">
                楽曲管理
              </x-nav-link>
            @endif

            @if (Route::has('admin.cards.index'))
              <x-nav-link :href="route('admin.cards.index')" :active="request()->routeIs('admin.cards.*')">
                カード管理
              </x-nav-link>
            @endif

            @if (Route::has('admin.events.index'))
              <x-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.*')">
                イベント管理
              </x-nav-link>
            @endif

            @if (Route::has('admin.lives.virtual.index'))
              <x-nav-link :href="route('admin.lives.virtual.index')" :active="request()->routeIs('admin.lives.virtual.*')">
                バチャライ管理
              </x-nav-link>
            @endif

            <div>
              <x-dropdown>
                <x-slot name="trigger">
                  <button @class([
                      'inline-flex items-center py-3.5 text-sm font-medium leading-5 transition duration-150 ease-in-out',
                      'text-puerto-rico-600 border-puerto-rico-600 hover:text-white focus:text-white' => request()->routeIs(
                          'front.*'),
                      'text-white hover:text-atlantis-300 focus:text-atlantis-300' => !request()->routeIs(
                          'front.*'),
                  ])>
                    <div>フロント</div>

                    <div class="ms-1">
                      <x-material-symbol type="rounded" optical-size="20">expand_more</x-material-symbol>
                    </div>
                  </button>
                </x-slot>

                <x-slot name="content">
                  @if (Route::has('front.event-calc'))
                    <x-dropdown-link :href="route('front.event-calc')">
                      イベントボーナスポイント計算機
                    </x-dropdown-link>
                  @endif

                  @if (Route::has('front.character-sort'))
                    <x-dropdown-link :href="route('front.character-sort')">
                      キャラソート
                    </x-dropdown-link>
                  @endif

                  @if (Route::has('front.dialogues.index'))
                    <x-dropdown-link :href="route('front.dialogues.index')">
                      掛け合い
                    </x-dropdown-link>
                  @endif

                  @if (Route::has('front.reports.index'))
                    <x-dropdown-link :href="route('front.reports.index')">
                      集計
                    </x-dropdown-link>
                  @endif
                </x-slot>
              </x-dropdown>
            </div>
          @endauth

          @guest
            @if (Route::has('front.event-calc'))
              <x-nav-link :href="route('front.event-calc')" :active="request()->routeIs('front.event-calc')">
                イベントボーナスポイント計算機
              </x-nav-link>
            @endif

            @if (Route::has('front.character-sort'))
              <x-nav-link :href="route('front.character-sort')" :active="request()->routeIs('front.character-sort')">
                キャラソート
              </x-nav-link>
            @endif

            @if (Route::has('front.dialogues.index'))
              <x-nav-link :href="route('front.dialogues.index')" :active="request()->routeIs('front.dialogues.*')">
                掛け合い
              </x-nav-link>
            @endif

            @if (Route::has('front.reports.index'))
              <x-nav-link :href="route('front.reports.index')" :active="request()->routeIs('front.reports.*')">
                集計
              </x-nav-link>
            @endif
          @endguest
        </div>
      </div>

      <!-- Settings Dropdown -->
      @if (Route::has('login'))
        @auth
          <div class="hidden md:ms-6 md:flex md:items-center">
            <x-dropdown align="right" width="48">
              <x-slot name="trigger">
                <button
                  class="inline-flex items-center rounded-md border border-transparent bg-puerto-rico-300 px-3 py-2 text-sm font-medium leading-4 text-gray-100 transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300">
                  <div>{{ Auth::user()->name }}</div>

                  <div class="ms-1">
                    <x-material-symbol type="rounded" optical-size="20">expand_more</x-material-symbol>
                  </div>
                </button>
              </x-slot>

              <x-slot name="content">
                <x-dropdown-link :href="route('admin.profile.edit')">
                  {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                  </x-dropdown-link>
                </form>
              </x-slot>
            </x-dropdown>
          </div>
        @else
          <div class="hidden justify-between space-x-2 md:flex">
            <x-nav-link :href="route('login')">
              Log in
            </x-nav-link>
            @if (Route::has('register'))
              <x-nav-link :href="route('register')">
                Register
              </x-nav-link>
            @endif
          </div>
        @endauth
      @endif

      <!-- Hamburger -->
      <div class="-me-2 flex items-center md:hidden">
        <button @click="open = ! open"
          class="inline-flex items-center justify-center rounded-md p-2 text-gray-100 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400">
          <x-material-symbol type="rounded" x-show="!open">menu</x-material-symbol>
          <x-material-symbol type="rounded" x-show="open">close</x-material-symbol>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden">
    <div class="space-y-1 pb-3 pt-2">
      @auth
        <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
          {{ __('Dashboard') }}
        </x-responsive-nav-link>

        @if (Route::has('admin.units.index'))
          <x-responsive-nav-link :href="route('admin.units.index')" :active="request()->routeIs('admin.units.*') && !request()->routeIs('admin.units.members.*')">
            ユニット管理
          </x-responsive-nav-link>
        @endif

        @if (Route::has('admin.members.index'))
          <x-responsive-nav-link :href="route('admin.members.index')" :active="request()->routeIs('admin.members.*') || request()->routeIs('admin.units.members.*')">
            メンバー管理
          </x-responsive-nav-link>
        @endif

        @if (Route::has('admin.icons.index'))
          <x-responsive-nav-link :href="route('admin.icons.index')" :active="request()->routeIs('admin.icons.*')">
            アイコン管理
          </x-responsive-nav-link>
        @endif

        @if (Route::has('admin.dialogues.index'))
          <x-responsive-nav-link :href="route('admin.dialogues.index')" :active="request()->routeIs('admin.dialogues.*')">
            掛け合い管理
          </x-responsive-nav-link>
        @endif

        @if (Route::has('admin.tunes.index'))
          <x-responsive-nav-link :href="route('admin.tunes.index')" :active="request()->routeIs('admin.tunes.*')">
            楽曲管理
          </x-responsive-nav-link>
        @endif

        @if (Route::has('admin.cards.index'))
          <x-responsive-nav-link :href="route('admin.cards.index')" :active="request()->routeIs('admin.cards.*')">
            カード管理
          </x-responsive-nav-link>
        @endif

        @if (Route::has('admin.events.index'))
          <x-responsive-nav-link :href="route('admin.events.index')" :active="request()->routeIs('admin.events.*')">
            イベント管理
          </x-responsive-nav-link>
        @endif

        @if (Route::has('admin.lives.virtual.index'))
          <x-responsive-nav-link :href="route('admin.lives.virtual.index')" :active="request()->routeIs('admin.lives.virtual.*')">
            バチャライ管理
          </x-responsive-nav-link>
        @endif
      @endauth

      @if (Route::has('front.event-calc'))
        <x-responsive-nav-link :href="route('front.event-calc')" :active="request()->routeIs('front.event-calc')">
          イベントボーナスポイント計算機
        </x-responsive-nav-link>
      @endif

      @if (Route::has('front.character-sort'))
        <x-responsive-nav-link :href="route('front.character-sort')" :active="request()->routeIs('front.character-sort')">
          キャラソート
        </x-responsive-nav-link>
      @endif

      @if (Route::has('front.dialogues.index'))
        <x-responsive-nav-link :href="route('front.dialogues.index')" :active="request()->routeIs('front.dialogues.*')">
          掛け合い
        </x-responsive-nav-link>
      @endif

      @if (Route::has('front.reports.index'))
        <x-responsive-nav-link :href="route('front.reports.index')" :active="request()->routeIs('front.reports.*')">
          集計
        </x-responsive-nav-link>
      @endif
    </div>

    <!-- Responsive Settings Options -->
    <div class="border-t border-gray-200 py-1 dark:border-gray-600">
      @auth
        <div class="px-4">
          <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
          <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
          <x-responsive-nav-link :href="route('admin.profile.edit')">
            {{ __('Profile') }}
          </x-responsive-nav-link>

          <!-- Authentication -->
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
              onclick="event.preventDefault();
                                          this.closest('form').submit();">
              {{ __('Log Out') }}
            </x-responsive-nav-link>
          </form>
        </div>
      @else
        <div class="mt-3 space-y-1">
          @if (Route::has('login'))
            <x-responsive-nav-link :href="route('login')">
              {{ __('Login') }}
            </x-responsive-nav-link>
          @endif

          @if (Route::has('register'))
            <x-responsive-nav-link :href="route('register')">
              {{ __('Register') }}
            </x-responsive-nav-link>
          @endif
        </div>
      @endauth

    </div>
  </div>
</nav>
