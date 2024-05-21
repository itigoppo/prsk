@php
  /**
   * @var \App\Models\Dialogue[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $dialogues
   */
@endphp
@section('title', '掛け合い管理')

<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col space-y-4 px-4 md:flex-row md:items-start md:justify-between md:space-y-0 md:px-0">
      <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        掛け合い管理
      </h2>
      @can('isAdmin')
        <a href="{{ route('admin.dialogues.create') }}">
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

          @include('admin.dialogues.search')

          {{ $dialogues->onEachSide(0)->links() }}

          <div class="my-4">
            <div
              class="flex h-10 w-full items-center space-x-1 rounded-t-md border border-gray-700 bg-gray-100 px-2 text-xs font-bold md:px-8">
              <div class="w-1/12 md:w-[2%]">音</div>
              <div class="w-4/12 md:w-[39%]">応</div>
              <div class="w-4/12 md:w-[39%]">答</div>
              <div class="w-3/12 text-center md:w-[20%]">操作</div>
            </div>

            @if ($dialogues->total() === 0)
              <div
                class="flex h-16 w-full items-center justify-center rounded-b-md border-x border-b border-gray-700 bg-white px-8 text-sm">
                まだ登録されていません
              </div>
            @endif

            @if ($dialogues->total() !== 0)
              @foreach ($dialogues as $dialogue)
                <div
                  class="min-h-10 flex w-full items-center space-x-1 border-x border-b border-gray-700 bg-white px-2 text-sm last:rounded-b-md md:px-8">
                  <div class="w-1/12 md:w-[2%]">
                    <x-material-symbol optical-size="20" class="text-scooter-600">
                      {{ $dialogue->file ? 'attach_file' : 'attach_file_off' }}
                    </x-material-symbol>
                  </div>
                  <div class="flex w-4/12 flex-col gap-1 md:w-[39%] md:flex-row">
                    @if (!empty($dialogue->fromMember))
                      <x-name-label :color="$dialogue->fromMember->color"
                        :bg-color="$dialogue->fromMember->bg_color">{{ $dialogue->fromMember->short_with_unit }}</x-name-label>
                    @else
                      <x-name-label color="#ffffff" bg-color="#818181">everyone</x-name-label>
                    @endif
                    <span>{{ $dialogue->from_line }}</span>
                  </div>
                  <div class="flex w-4/12 flex-col gap-1 md:w-[39%] md:flex-row">
                    @if (!empty($dialogue->toMember))
                      <x-name-label :color="$dialogue->toMember->color"
                        :bg-color="$dialogue->toMember->bg_color">{{ $dialogue->toMember->short_with_unit }}</x-name-label>
                    @else
                      <x-name-label color="#ffffff" bg-color="#818181">everyone</x-name-label>
                    @endif
                    <span>{{ $dialogue->to_line }}</span>
                  </div>
                  <div class="w-3/12 text-center md:w-[20%]">
                    <div class="flex flex-col justify-center p-2 max-md:space-y-1 md:flex-row md:space-x-2">
                      <a href="{{ route('admin.dialogues.view', ['id' => $dialogue->id]) }}">
                        <x-button-surface type="outline" size="sm">
                          詳細
                        </x-button-surface>
                      </a>

                      <button type="button" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion-{{ $dialogue->id }}')">
                        <x-button-surface type="secondary" size="sm">
                          削除
                        </x-button-surface>
                      </button>
                      @include('admin.dialogues.delete')
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>

          {{ $dialogues->onEachSide(0)->links() }}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
