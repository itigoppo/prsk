<fieldset class="flex flex-col md:flex-row md:border-y md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="unit_id" value="ユニット" />
  </div>
  <div class="flex-1 p-4">
    <x-select class="w-full" name="unit_id" :current="old('unit_id', $member->unit_id ?? '')" :options="$unitOptions" />
    <x-input-error class="mt-2" :messages="$errors->get('unit_id')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="icon_id" value="アイコン" />
  </div>
  <div class="flex-1 p-4">
    <x-select class="w-full" name="icon_id" :current="old('icon_id', $member->icon_id ?? '')" :options="$iconOptions" />
    <x-input-error class="mt-2" :messages="$errors->get('icon_id')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="code" value="メンバーコード" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="code" name="code" type="text" class="block w-full" :value="old('code', $member->code ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('code')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="name" value="メンバー名" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="name" name="name" type="text" class="block w-full" :value="old('name', $member->name ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('name')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="short" value="短縮名" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="short" name="short" type="text" class="block w-full" :value="old('short', $member->short ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('short')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="bg_color" value="メンバーカラーコード" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="bg_color" name="bg_color" type="color" class="block h-10" :value="old('bg_color', $member->bg_color ?? '#e9ecef')" required />
    <x-input-error class="mt-2" :messages="$errors->get('bg_color')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="color" value="テキストカラーコード" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="color" name="color" type="color" class="block h-10" :value="old('color', $member->color ?? '')" required />
    <x-input-error class="mt-2" :messages="$errors->get('color')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="is_active" value="有効/無効" />
  </div>
  <div class="flex-1 p-4">
    <x-checkbox-button id="is_active" name="is_active" value="1" :current="old('is_active', $member->is_active ?? 0)">有効</x-checkbox-button>
    <x-input-error class="mt-2" :messages="$errors->get('is_active')" />
  </div>
</fieldset>
