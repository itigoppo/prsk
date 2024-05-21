@props([
    'disabled' => false,
    'current' => [],
    'options' => collect([['label' => '選択してください', 'value' => '']]),
    'class' => '',
    'id' => '',
])

{{-- <x-slot name="script"> --}}
<script>
  document.addEventListener('alpine:init', () => {
    Alpine.data(`multiSelect{{ $id }}`, () => ({
      options: @json($options),
      selected: @json($current),
      selectedOptions: [],
      restOptions: [],
      show: false,
      open() {
        this.show = true
      },
      close() {
        this.show = false
      },
      isOpen() {
        return this.show === true
      },
      init() {
        this.selectedOptions = this.options.filter((item) => {
          return this.selected.includes(item.value.toString())
        })
        this.restOptions = this.options.filter((item) => {
          return !this.selected.includes(item.value.toString())
        })
      },
      remove(value) {
        this.selected = this.selected.filter(e => e !== value.toString())
        this.selectedOptions = this.options.filter((item) => {
          return this.selected.includes(item.value.toString())
        })
        this.restOptions = this.options.filter((item) => {
          return !this.selected.includes(item.value.toString())
        })
      },
      insert(value) {
        this.selected.push(value)
        this.selectedOptions = this.options.filter((item) => {
          return this.selected.includes(item.value.toString())
        })
        this.restOptions = this.options.filter((item) => {
          return !this.selected.includes(item.value.toString())
        })

        if (this.restOptions.length === 0) {
          this.close()
        }
      }
    }))
  })
</script>
{{-- </x-slot> --}}

<div class="@twMerge('relative inline-flex' . ($class ? ' ' . $class : ''))" x-data="multiSelect{{ $id }}()">
  <div x-on:click="open" @class([
      'flex flex-auto flex-row flex-wrap appearance-none rounded border border-gray-300 py-[11px] pl-4 pr-10 text-sm leading-none shadow-sm hover:cursor-pointer focus:cursor-pointer focus:border-puerto-rico-300 focus:ring-puerto-rico-300',
      'pointer-events-none bg-gray-20 shadow-none' => $disabled,
  ])>

    <div x-show="selected.length === 0">選択してください</div>
    <div x-show="selected.length !== 0" class="z-10 flex flex-wrap gap-1">
      <template x-for="(item, index) in selectedOptions" :key="index">
        <span @click.stop class="flex rounded border text-[10px] leading-none hover:cursor-default"
          :style="`background-color: ${item.bgColor}; border-color: ${item.bgColor}; color: ${item.color}`">
          <input type="checkbox" {{ $attributes }} :value="item.value" @checked(true)
            class="peer hidden" />
          <div class="border-r border-white py-1 pl-2 pr-1" x-text="item.label"></div>
          <div class="items-center px-1 py-1 hover:cursor-pointer" x-on:click="remove(`${item.value}`)">
            <x-material-symbol type="rounded" optical-size="10">close</x-material-symbol>
          </div>
        </span>
      </template>
    </div>

  </div>

  <div x-show="!isOpen()"
    class="size-4 pointer-events-none absolute inset-y-0 right-3.5 m-auto grid place-content-center">
    <x-material-symbol type="rounded" optical-size="20" class="text-gray-400">expand_more</x-material-symbol>
  </div>

  <div x-show="isOpen()"
    class="size-4 pointer-events-none absolute inset-y-0 right-3.5 m-auto grid place-content-center">
    <x-material-symbol type="rounded" optical-size="20" class="text-gray-400">expand_less</x-material-symbol>
  </div>

  <div x-show="isOpen()" x-on:click.away="close" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="max-md:max-w-72 absolute left-4 top-8 z-50 max-h-96 w-[calc(100%-10px)] overflow-y-scroll rounded border border-gray-400 bg-white p-2 opacity-100">

    <div x-show="restOptions.length === 0">No Items.</div>
    <div x-show="restOptions.length !== 0" class="flex flex-wrap gap-1">
      <template x-for="(item, index) in restOptions" :key="index">
        <div>
          <span class="rounded border px-2 py-1 text-[10px] leading-none hover:cursor-pointer" x-text="item.label"
            :style="`background-color: ${item.bgColor}; border-color: ${item.bgColor}; color: ${item.color}`"
            x-on:click="insert(`${item.value}`)"></span>
        </div>
      </template>
    </div>

  </div>
</div>
