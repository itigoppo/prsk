<x-modal name="confirm-deletion-{{ $member->id }}" :show="false">
  <form method="POST"
    action="{{ route('admin.units.members.destroy', ['id' => $member->unit_id, 'member_id' => $member->id]) }}"
    class="p-4">
    @csrf
    @method('delete')

    <div class="p-4">
      <div class="text-sm">
        {{ $member->name }}を削除しますが、よろしいですか？
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
