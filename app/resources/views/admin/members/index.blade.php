@php
  /**
   * @var \App\Models\Member[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $members
   */
@endphp
@section('title', 'メンバー管理')

<x-app-layout>
  <x-slot name="header">
    <div class="flex flex-col space-y-4 px-4 md:flex-row md:items-start md:justify-between md:space-y-0 md:px-0">
      <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        メンバー管理
      </h2>
      @can('isAdmin')
        <a href="{{ route('admin.members.create') }}">
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

          @include('admin.members.search')

          {{ $members->onEachSide(0)->links() }}

          <div class="my-4">
            <div
              class="flex h-10 w-full items-center space-x-1 rounded-t-md border border-gray-700 bg-gray-100 px-2 text-xs font-bold md:px-8">
              <div class="w-1/12 md:w-[3%]"></div>
              <div class="w-1/12 md:w-[7%]">アイコン</div>
              <div class="w-2/12 md:w-[10%]">ユニット</div>
              <div class="w-3/12 md:w-[29%]">名前</div>
              <div class="max-md:hidden md:w-[20%]">短縮名</div>
              <div class="w-2/12 md:w-[11%]">カラー</div>
              <div class="w-3/12 text-center md:w-[20%]">操作</div>
            </div>

            @if ($members->total() === 0)
              <div
                class="flex h-16 w-full items-center justify-center rounded-b-md border-x border-b border-gray-700 bg-white px-8 text-sm">
                まだ登録されていません
              </div>
            @endif

            @if ($members->total() !== 0)
              @foreach ($members as $member)
                <div
                  class="min-h-10 flex w-full items-center space-x-1 border-x border-b border-gray-700 bg-white px-2 text-sm last:rounded-b-md md:px-8">
                  <div class="w-1/12 md:w-[3%]">
                    <x-material-symbol optical-size="20" class="text-scooter-600">
                      {{ $member->is_active ? 'music_note' : 'music_off' }}
                    </x-material-symbol>
                  </div>
                  <div class="w-1/12 md:w-[7%]">
                    @if (!empty($member->icon_id))
                      <img src="{{ route('admin.icons.display', ['id' => $member->icon_id]) }}"
                        class="aspect-square h-10 object-contain">
                    @endif
                  </div>
                  <div class="w-2/12 text-center md:w-[10%]">
                    <x-name-label :color="$member->unit->color" :bg-color="$member->unit->bg_color">{{ $member->unit->short }}</x-name-label>
                  </div>
                  <div class="w-3/12 md:w-[29%]">
                    {{ $member->name }}
                  </div>
                  <div class="max-md:hidden md:w-[20%]">
                    {{ $member->short }}
                  </div>
                  <div class="w-2/12 md:w-[11%]">
                    <div class="flex flex-wrap content-start items-start gap-0.5 self-stretch">
                      <x-name-label :color="$member->color" :bg-color="$member->bg_color">color</x-name-label>
                      <x-name-label :color="$member->color" :bg-color="$member->bg_color" type="outline">color</x-name-label>
                    </div>
                  </div>
                  <div class="w-3/12 md:w-[20%]">
                    <div class="flex flex-col justify-center p-2 max-md:space-y-1 md:flex-row md:space-x-2">
                      <a
                        href="{{ route('admin.units.members.view', ['id' => $member->unit_id, 'member_id' => $member->id]) }}">
                        <x-button-surface type="outline" size="sm">
                          詳細
                        </x-button-surface>
                      </a>

                      <button type="button" x-data=""
                        x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion-{{ $member->id }}')">
                        <x-button-surface type="secondary" size="sm">
                          削除
                        </x-button-surface>
                      </button>
                      @include('admin.members.delete')
                    </div>
                  </div>
                </div>
              @endforeach
            @endif
          </div>

          {{ $members->onEachSide(0)->links() }}

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
