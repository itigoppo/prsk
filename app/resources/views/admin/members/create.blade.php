@section('title', 'メンバー作成')

<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col space-y-4 px-4 md:flex-row md:items-start md:justify-between md:space-y-0 md:px-0">
      <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        メンバー作成
      </h2>

      <a href="{{ route('admin.members.index') }}">
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

          <form method="POST" action="{{ route('admin.members.store') }}">
            @csrf
            @include('admin.members.form')

            <div class="mt-8 flex justify-center space-x-2">

              <a href="{{ route('admin.members.index') }}" class="flex-1">
                <x-button-surface type="secondary">
                  キャンセル
                </x-button-surface>
              </a>

              <button type="submit" class="flex-1">
                <x-button-surface>この内容で作成</x-button-surface>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
