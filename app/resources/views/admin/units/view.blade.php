@section('title', 'ユニット詳細: ' . $unit->name)

<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col space-y-4 px-4 md:flex-row md:items-start md:justify-between md:space-y-0 md:px-0">
      <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        ユニット詳細 - {{ $unit->name }}
      </h2>

      <a href="{{ route('admin.units.index') }}">
        <x-button-surface type="outline" size="sm">
          <x-material-symbol optical-size="20">list_alt</x-material-symbol>
          一覧
        </x-button-surface>
      </a>
    </div>
  </x-slot>

  <div class="py-2">
    <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          <fieldset class="flex flex-col md:flex-row md:border-y md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="name" value="ユニット名" />
            </div>
            <div class="flex-1 p-4">
              {{ $unit->name }}
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="short" value="短縮名" />
            </div>
            <div class="flex-1 p-4">
              {{ $unit->short }}
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="bg_color" value="ユニットカラーコード" />
            </div>
            <div class="flex flex-1 items-center gap-x-2 p-4">
              <div class="items-center border p-0.5">
                <span style="background-color: {{ $unit->bg_color }}" class="block h-4 w-4"></span>
              </div>
              <span>{{ $unit->bg_color }}</span>
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="color" value="テキストカラーコード" />
            </div>
            <div class="flex flex-1 items-center gap-x-2 p-4">
              <div class="items-center border p-0.5">
                <span style="background-color: {{ $unit->color }}" class="block h-4 w-4"></span>
              </div>
              <span>{{ $unit->color }}</span>
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="is_active" value="有効/無効" />
            </div>
            <div class="flex flex-1 items-center gap-x-2 p-4">
              <x-material-symbol optical-size="20" class="text-scooter-600">
                {{ $unit->is_active ? 'music_note' : 'music_off' }}
              </x-material-symbol>
              <span>
                {{ $unit->is_active ? '有効' : '無効' }}
              </span>
            </div>
          </fieldset>

          @can('isAdmin')
            <div class="mt-8 flex justify-center space-x-2">

              <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion-{{ $unit->id }}')" class="flex-1">
                <x-button-surface type="secondary">
                  <x-material-symbol optical-size="20">delete</x-material-symbol>
                  削除
                </x-button-surface>
              </button>

              <a href="{{ route('admin.units.edit', ['id' => $unit->id]) }}" class="flex-1">
                <x-button-surface type="outline">
                  <x-material-symbol optical-size="20">edit_square</x-material-symbol>
                  編集
                </x-button-surface>
              </a>
            </div>
          @endcan

        </div>
      </div>
    </div>
  </div>

  @include('admin.units.delete')
</x-app-layout>
