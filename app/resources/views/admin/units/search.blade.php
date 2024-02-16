<div class="mb-4">
  <form method="POST" action="{{ route('admin.units.search') }}">
    @csrf

    <fieldset class="flex flex-col md:flex-row md:border-y md:border-gray-100">
      <div
        class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
        <x-input-label for="name" value="ユニット名" />
      </div>
      <div class="flex-1 p-4">
        <x-text-input name="filter[name]" type="text" class="block w-full" :value="$filter->get('name')" />
      </div>
    </fieldset>

    <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
      <div
        class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
        <x-input-label for="is_active" value="有効/無効" />
      </div>
      <div class="flex-1 p-4">
        <x-select class="w-full" name="filter[is_active]" :current="$filter->get('is_active')" :options="collect([
            ['label' => '問わない', 'value' => ''],
            ['label' => '有効', 'value' => '1'],
            ['label' => '無効', 'value' => '0'],
        ])" />
      </div>
    </fieldset>

    <div class="mt-8 flex justify-center space-x-2 md:px-56">

      <a href="{{ route('admin.units.index') }}" class="flex-1">
        <x-button-surface type="secondary" size="sm" class="py-2.5">
          リセット
        </x-button-surface>
      </a>

      <button type="submit" class="flex-1">
        <x-button-surface type="outline" size="sm">
          <x-material-symbol optical-size="20">search</x-material-symbol>
          検索
        </x-button-surface>
      </button>
    </div>
  </form>
</div>
