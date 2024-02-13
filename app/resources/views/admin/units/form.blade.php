<fieldset class="flex flex-col md:flex-row md:border-y md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="name" value="ユニット名" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $unit->name ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="short" value="短縮名" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="short" name="short" type="text" class="block w-full" :value="old('short', $unit->short ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('short')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="bg_color" value="ユニットカラーコード" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="bg_color" name="bg_color" type="color" class="block h-10" :value="old('bg_color', $unit->bg_color ?? '')" required />
    <x-input-error class="mt-2" :messages="$errors->get('bg_color')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="color" value="テキストカラーコード" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="color" name="color" type="color" class="block h-10" :value="old('color', $unit->color ?? '')" required />
    <x-input-error class="mt-2" :messages="$errors->get('color')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="is_active" value="有効/無効" />
  </div>
  <div class="flex-1 p-4">
    <x-checkbox-button id="is_active" name="is_active" value="1" :current="old('is_active', $unit->is_active ?? 0)">有効</x-checkbox-button>
    <x-input-error class="mt-2" :messages="$errors->get('is_active')" />
  </div>
</fieldset>
