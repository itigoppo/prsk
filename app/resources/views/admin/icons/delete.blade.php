<x-modal name="confirm-deletion-{{ $icon->id }}" :show="false">
  <form method="POST" action="{{ route('admin.icons.destroy', ['id' => $icon->id]) }}" class="p-4">
    @csrf
    @method('delete')

    <div class="p-4">
      <div class="text-sm">
        <div
          class="mb-2 grid h-14 w-14 grid-rows-[auto_1fr] overflow-hidden rounded shadow-[4px_4px_16px_0px_rgba(0,_0,_0,_0.08),_0px_0px_2px_0px_rgba(0,_0,_0,_0.25)]">
          <div class="bg-gray-50">
            <img src="{{ route('admin.icons.display', ['id' => $icon->id]) }}"
              class="aspect-square w-full object-contain">
          </div>
        </div>

        <div>この画像を削除しますが、よろしいですか？</div>
      </div>
    </div>

    <div class="mt-6 flex justify-end space-x-3">
      <button type="button" x-on:click="$dispatch('close')">
        <x-button-surface type="outline" size="sm">
          {{ __('Cancel') }}
        </x-button-surface>
      </button>

      <button type="submit">
        <x-button-surface type="secondary" size="sm">
          <x-material-symbol optical-size="20">delete</x-material-symbol>
          削除
        </x-button-surface>
      </button>
    </div>
  </form>
</x-modal>
