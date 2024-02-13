{{ $icons->onEachSide(0)->links() }}

<div class="my-4 grid grid-cols-3 gap-2 md:mt-8 md:grid-cols-6">
  @foreach ($icons as $icon)
    <div
      class="grid grid-rows-[auto_1fr] overflow-hidden rounded shadow-[4px_4px_16px_0px_rgba(0,_0,_0,_0.08),_0px_0px_2px_0px_rgba(0,_0,_0,_0.25)]">
      <div class="bg-gray-50">
        <img src="{{ route('admin.icons.display', ['id' => $icon->id]) }}" class="aspect-square w-full object-contain">
      </div>

      <div class="grid grid-rows-[1fr_auto] p-2">
        <div class="break-all text-xs">
          {{ $icon->label }}
        </div>
        <div class="mt-2">

          <button type="button" class="w-full" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion-{{ $icon->id }}')">
            <x-button-surface type="secondary" size="sm" class="w-full">
              削除
            </x-button-surface>
          </button>
          @include('admin.icons.delete')
        </div>
      </div>
    </div>
  @endforeach
</div>

{{ $icons->onEachSide(0)->links() }}
