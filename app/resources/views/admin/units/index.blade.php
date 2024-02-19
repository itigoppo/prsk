@php
  /**
   * @var \App\Models\Unit[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $units
   */
@endphp
@section('title', 'ユニット管理')

<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col space-y-4 px-4 md:flex-row md:items-start md:justify-between md:space-y-0 md:px-0">
      <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        ユニット管理
      </h2>
      @can('isAdmin')
        <a href="{{ route('admin.units.create') }}">
          <x-button-surface type="outline" size="sm">
            <x-material-symbol optical-size="20">edit_square</x-material-symbol>
            新規登録
          </x-button-surface>
        </a>
      @endcan
    </div>
  </x-slot>

  <div class="py-2">
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          @include('admin.units.search')

          {{ $units->onEachSide(0)->links() }}

          <div class="my-4">
            <div
              class="flex h-10 w-full items-center space-x-1 rounded-t-md border border-gray-700 bg-gray-100 px-2 text-xs font-bold md:px-8">
              <div class="w-1/12 md:w-[3%]"></div>
              <div class="w-5/12 md:w-[35%]">ユニット名</div>
              <div class="max-md:hidden md:w-[20%]">短縮名</div>
              <div class="w-2/12 md:w-[11%]">カラー</div>
              <div class="w-4/12 text-center md:w-[31%]">操作</div>
            </div>

            @if ($units->total() === 0)
              <div
                class="flex h-16 w-full items-center justify-center rounded-b-md border-x border-b border-gray-700 bg-white px-8 text-sm">
                まだ登録されていません
              </div>
            @endif

            @if ($units->total() !== 0)
              @foreach ($units as $unit)
                <div
                  class="min-h-10 flex w-full items-center space-x-1 border-x border-b border-gray-700 bg-white px-2 text-sm last:rounded-b-md md:px-8">
                  <div class="w-1/12 md:w-[3%]">
                    <x-material-symbol optical-size="20" class="text-scooter-600">
                      {{ $unit->is_active ? 'music_note' : 'music_off' }}
                    </x-material-symbol>
                  </div>
                  <div class="w-5/12 md:w-[35%]">
                    {{ $unit->name }}
                  </div>
                  <div class="max-md:hidden md:w-[20%]">
                    {{ $unit->short }}
                  </div>
                  <div class="w-2/12 md:w-[11%]">
                    <div class="flex flex-wrap content-start items-start gap-0.5 self-stretch">
                      <x-name-label :color="$unit->color" :bg-color="$unit->bg_color">color</x-name-label>
                      <x-name-label :color="$unit->color" :bg-color="$unit->bg_color" type="outline">color</x-name-label>
                    </div>
                  </div>
                  <div class="w-4/12 md:w-[31%]">
                    <div class="flex flex-col justify-center p-2 max-md:space-y-1 md:flex-row md:space-x-2">
                      <a href="{{ route('admin.units.view', ['id' => $unit->id]) }}">
                        <x-button-surface type="outline" size="sm">
                          詳細
                        </x-button-surface>
                      </a>

                      <a href="{{ route('admin.members.index', ['filter[unit]' => $unit->id]) }}">
                        <x-button-surface type="outline" size="sm">
                          メンバー
                        </x-button-surface>
                      </a>

                      <button type="button" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion-{{ $unit->id }}')">
                        <x-button-surface type="secondary" size="sm">
                          削除
                        </x-button-surface>
                      </button>
                      @include('admin.units.delete')
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>

          {{ $units->onEachSide(0)->links() }}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
