<fieldset class="flex flex-col md:flex-row md:border-y md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="from_member_id" value="応メンバー" />
  </div>
  <div class="flex-1 p-4">
    <x-select class="w-full" name="from_member_id" :current="old('from_member_id', $dialogue->from_member_id ?? '')" :options="$memberOptions" />
    <x-input-error class="mt-2" :messages="$errors->get('from_member_id')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="from_line" value="応セリフ" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="from_line" name="from_line" type="text" class="block w-full" :value="old('from_line', $dialogue->from_line ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('from_line')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="to_member_id" value="答メンバー" />
  </div>
  <div class="flex-1 p-4">
    <x-select class="w-full" name="to_member_id" :current="old('to_member_id', $dialogue->to_member_id ?? '')" :options="$memberOptions" />
    <x-input-error class="mt-2" :messages="$errors->get('to_member_id')" />
  </div>
</fieldset>

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="to_line" value="答セリフ" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="to_line" name="to_line" type="text" class="block w-full" :value="old('to_line', $dialogue->to_line ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('to_line')" />
  </div>
</fieldset>

@if (Request::routeIs('admin.dialogues.edit'))
  <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
    <div
      class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
      <x-input-label for="change_file" value="ファイル" />
    </div>
    <div class="flex-1 space-y-4 p-4">
      @if ($dialogue->file)
        <div class="flex items-center gap-2">
          <audio controls="" controlslist="nodownload" id="audio-file">
            <source src="{{ route('admin.dialogues.display', ['id' => $dialogue->id]) }}" type="audio/mpeg">
          </audio>
          <x-checkbox-button id="is_deleted" name="is_deleted" value="1"
            :current="old('is_deleted', $dialogue->is_deleted ?? 0)">削除する</x-checkbox-button>
        </div>
      @endif
      <div>
        <x-file-input id="change_file" name="change_file" type="file" class="block w-full" accept="audio/*" />
        <x-input-error class="mt-2" :messages="$errors->get('change_file')" />
      </div>
    </div>
  </fieldset>
@else
  <fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
    <div
      class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
      <x-input-label for="file" value="ファイル" />
    </div>
    <div class="flex-1 p-4">
      <x-file-input id="file" name="file" type="file" class="block w-full" accept="audio/*" />
      <x-input-error class="mt-2" :messages="$errors->get('file')" />
    </div>
  </fieldset>
@endif

<fieldset class="flex flex-col md:flex-row md:border-b md:border-gray-100">
  <div
    class="flex items-center border-l-4 border-puerto-rico-200 px-4 py-2 md:w-1/4 md:border-0 md:bg-puerto-rico-200 md:p-4">
    <x-input-label for="note" value="備考" />
  </div>
  <div class="flex-1 p-4">
    <x-text-input id="note" name="note" type="text" class="block w-full" :value="old('note', $dialogue->note ?? '')" />
    <x-input-error class="mt-2" :messages="$errors->get('note')" />
  </div>
</fieldset>
