<x-modal name="confirm-deletion-{{ $unit->id }}" :show="false">
  <form method="POST" action="{{ route('admin.units.destroy', ['id' => $unit->id]) }}" class="p-4">
    @csrf
    @method('delete')

    <div class="p-4">
      <p class="text-sm">
        {{ $unit->name }}を削除しますが、よろしいですか？
      </p>
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
