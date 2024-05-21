<div class="mb-4">
  <form method="POST" action="{{ route('admin.dialogues.search') }}">
    @csrf

    <fieldset class="flex flex-col md:flex-row md:border-y md:border-gray-100">
      <div
        class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
        <x-input-label for="name" value="応メンバー" />
      </div>
      <div class="flex-1 p-4">
        <x-multi-select class="w-full" name="filter[from_member_ids][]" id="from_member_ids" :current="$filter->get('from_member_ids')"
          :options="$memberOptions" />
      </div>
    </fieldset>

    <fieldset class="flex flex-col md:flex-row md:border-y md:border-gray-100">
      <div
        class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
        <x-input-label for="name" value="答メンバー" />
      </div>
      <div class="flex-1 p-4">
        <x-multi-select class="w-full" name="filter[to_member_ids][]" id="to_member_ids" :current="$filter->get('to_member_ids')"
          :options="$memberOptions" />
      </div>
    </fieldset>

    <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
      <div
        class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
        <x-input-label for="is_active" value="ファイル有無" />
      </div>
      <div class="flex-1 p-4">
        <x-radio-group class="w-full" name="filter[has_file]" :current="$filter->get('has_file') ?? ''" :options="collect([
            ['label' => '問わない', 'value' => ''],
            ['label' => '有り', 'value' => '1'],
            ['label' => '無し', 'value' => '0'],
        ])" />
      </div>
    </fieldset>

    <div class="mt-8 flex justify-center space-x-2 md:px-56">

      <a href="{{ route('admin.dialogues.index') }}" class="flex-1">
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
