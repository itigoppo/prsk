<x-app-layout>
  <x-slot name="header">
    <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
      {{ __('Profile') }}
    </h2>
  </x-slot>

  <div class="py-4">
    <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
      <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
        <div class="max-w-xl">
          @include('admin.profile.partials.update-profile-information-form')
        </div>
      </div>

      <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
        <div class="max-w-xl">
          @include('admin.profile.partials.update-password-form')
        </div>
      </div>

      <div class="bg-white p-4 shadow dark:bg-gray-800 sm:rounded-lg sm:p-8">
        <div class="max-w-xl">
          @include('admin.profile.partials.delete-user-form')
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
