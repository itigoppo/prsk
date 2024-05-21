@section('title', '掛け合い詳細: ' . $dialogue->name)

<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col space-y-4 px-4 md:flex-row md:items-start md:justify-between md:space-y-0 md:px-0">
      <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        掛け合い詳細 - {{ $dialogue->name }}
      </h2>

      <a href="{{ route('admin.dialogues.index') }}">
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
              <x-input-label for="from_member_id" value="応メンバー" />
            </div>
            <div class="flex-1 p-4">
              @if (!empty($dialogue->fromMember))
                {{ $dialogue->fromMember->name_with_unit }}
              @else
                everyone
              @endif
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="from_line" value="応セリフ" />
            </div>
            <div class="flex-1 p-4">
              {{ $dialogue->from_line }}
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="from_member_id" value="答メンバー" />
            </div>
            <div class="flex-1 p-4">
              @if (!empty($dialogue->toMember))
                {{ $dialogue->toMember->name_with_unit }}
              @else
                everyone
              @endif
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="from_line" value="答セリフ" />
            </div>
            <div class="flex-1 p-4">
              {{ $dialogue->to_line }}
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="file" value="ファイル" />
            </div>
            <div class="flex-1 p-4">
              @if ($dialogue->file)
                <audio controls="" controlslist="nodownload" id="audio-file">
                  <source src="{{ route('admin.dialogues.display', ['id' => $dialogue->id]) }}" type="audio/mpeg">
                </audio>
              @else
                -
              @endif
            </div>
          </fieldset>

          <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
            <div
              class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
              <x-input-label for="from_line" value="備考" />
            </div>
            <div class="flex-1 p-4">
              {{ $dialogue->note }}
            </div>
          </fieldset>


          @can('isAdmin')
            <div class="mt-8 flex justify-center space-x-2">

              <button type="button" x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion-{{ $dialogue->id }}')" class="flex-1">
                <x-button-surface type="secondary">
                  <x-material-symbol optical-size="20">delete</x-material-symbol>
                  削除
                </x-button-surface>
              </button>

              <a href="{{ route('admin.dialogues.edit', ['id' => $dialogue->id]) }}" class="flex-1">
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

  @include('admin.dialogues.delete')
</x-app-layout>
