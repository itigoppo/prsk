@php
  /**
   * @var \App\Models\Icon[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $icons
   */
@endphp
@section('title', 'アイコン管理')

<x-app-layout>
  <x-slot name="script">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
    <script>
      Dropzone.autoDiscover = false;
      document.addEventListener('alpine:init', () => {
        Alpine.data('dropzone', () => ({
          files: [],
          init() {
            this.dropzone();
            document.addEventListener('upload', () => this.fetch());
          },
          fetch() {
            fetch('{{ route('admin.icons.lookup') }}', {
                method: "GET",
              }).then(response => response.text())
              .then(text => {
                const box = document.getElementById('fetch-icon')
                box.innerHTML = text
              });
          },
          dropzone() {
            new Dropzone("#icon-dropzone", {
              'headers': {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
              },
              init() {
                this.on("complete", () => {
                  document.dispatchEvent(new CustomEvent('upload'));
                });
              },
              url: '{{ route('admin.icons.store') }}',
              acceptedFiles: '.jpeg,.jpg,.png,.gif',
              maxFilesize: 2,
              init: function() {
                this.on('dragover', function(event) {});
                this.on('dragleave', function(event) {});
                this.on('uploadprogress', function(event, progress) {
                  console.log('File progress', progress);
                });
                this.on('error', function(event, response) {
                  console.log('error response', response);
                });
                this.on('success', function(event, response, xhr) {
                  console.log('success response', response);
                  this.removeFile(event);
                  document.dispatchEvent(new CustomEvent('upload'));
                });
              },
            });
          }
        }))
      })
    </script>
  </x-slot>

  <x-slot name="header">
    <div class="flex flex-col space-y-4 px-4 md:flex-row md:items-start md:justify-between md:space-y-0 md:px-0">
      <h2 class="text-lg font-semibold leading-tight text-gray-800 dark:text-gray-200">
        アイコン管理
      </h2>
    </div>
  </x-slot>

  <div class="py-2">
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          @can('isAdmin')
            <form action="{{ route('admin.icons.store') }}" class="dropzone mb-4" id="icon-dropzone"
              enctype="multipart/form-data" x-data="dropzone()">
              @csrf
            </form>
          @endcan

          <div id="fetch-icon">
            @include('admin.icons.lookup')
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
