<x-app-layout>
  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          <div x-data="carousel()" class="relative mx-auto w-full px-2 md:w-1/2 md:px-0">
            <img class="w-full object-cover object-center" :src="images[selected]" alt="mountains" />

            <button @click="if (selected > 0 ) {selected -= 1} else { selected = images.length - 1 }"
              class="group absolute inset-y-0 left-0 h-full w-8 cursor-pointer px-2 py-[25%] hover:bg-gray-500 hover:bg-opacity-75">
              <span class="hidden text-gray-50 group-hover:block">
                <x-material-symbol type="rounded">keyboard_double_arrow_left</x-material-symbol>
              </span>
            </button>
            <button @click="if (selected < images.length - 1  ) {selected += 1} else { selected = 0 }"
              class="group absolute inset-y-0 right-0 h-full w-8 cursor-pointer px-2 py-[25%] hover:bg-gray-500 hover:bg-opacity-75">
              <span class="hidden text-gray-50 group-hover:block">
                <x-material-symbol type="rounded">keyboard_double_arrow_right</x-material-symbol>
              </span>
            </button>

            <div class="absolute bottom-0 flex w-full justify-center space-x-2 p-4">
              <template x-for="(image,index) in images" :key="index">
                <button @click="selected = index"
                  :class="{ 'bg-gray-300': selected == index, 'bg-gray-500': selected != index }"
                  class="h-2 w-2 rounded-full ring-2 ring-gray-300 hover:bg-gray-300"></button>
              </template>
            </div>
          </div>

          <div x-data="menu()" class="mt-4 space-y-2">
            <template x-for="(item, index) in items" :key="index">
              <div>
                <a x-bind:href="item.href" x-text="item.label"
                  class="border-b border-b-azure-500 text-azure-500 hover:text-azure-700"></a>
                <div class="ml-4" x-text="item.content" />
              </div>
            </template>
          </div>

          <script>
            document.addEventListener('alpine:init', () => {
              Alpine.data('carousel', () => ({
                duration: 5000,
                progress: 0,
                firstFrameTime: 0,
                selected: 0,
                images: [
                  "https://pbs.twimg.com/media/FA48dZ_VkAESI99?format=jpg&name=medium",
                  "https://pbs.twimg.com/media/FA5FX--VkAEfPsh?format=jpg&name=medium",
                  "https://pbs.twimg.com/media/FA2vRS6VkAU6U2n?format=jpg&name=medium",
                  "https://pbs.twimg.com/media/FA2vRS-UUAMCbaU?format=jpg&name=medium",
                  "https://pbs.twimg.com/media/FA2vRTQUUAAkDCL?format=jpg&name=medium",
                  "https://pbs.twimg.com/media/FA2vRT2UYAIm8k-?format=jpg&name=medium",
                  "https://pbs.twimg.com/media/E_Z-w0zUUAEtP8V?format=jpg&name=medium",
                  "https://pbs.twimg.com/media/FPO-qAiUcAEjpJA?format=jpg&name=medium",
                  "https://pbs.twimg.com/media/FPO03xEVgAQabcy?format=jpg&name=medium",
                ],
                init() {
                  this.startAnimation()
                  this.$watch('selected', callback => {
                    cancelAnimationFrame(this.frame)
                    this.startAnimation()
                  })
                },
                startAnimation() {
                  this.progress = 0
                  this.$nextTick(() => {
                    this.firstFrameTime = performance.now()
                    this.frame = requestAnimationFrame(this.animate.bind(this))
                  })
                },
                animate(now) {
                  let timeFraction = (now - this.firstFrameTime) / this.duration
                  if (timeFraction <= 1) {
                    this.progress = timeFraction * 100
                    this.frame = requestAnimationFrame(this.animate.bind(this))
                  } else {
                    timeFraction = 1
                    this.selected = (this.selected + 1) % this.images.length
                  }
                }
              }))

              Alpine.data('menu', () => ({
                items: [
                  @if (Route::has('front.event-calc'))
                    {
                      href: "{{ route('front.event-calc') }}",
                      label: "イベントボーナスポイント計算機",
                      content: "特効簡易計算機。",
                    },
                  @endif
                  @if (Route::has('front.character-sort'))
                    {
                      href: "{{ route('front.character-sort') }}",
                      label: "キャラソート",
                      content: "よくあるやつ。",
                    },
                  @endif
                  @if (Route::has('front.interactions.index'))
                    {
                      href: "{{ route('front.interactions.index') }}",
                      label: "掛け合い",
                      content: "わんわんーーーわんだほーーーい☆",
                    },
                  @endif
                  @if (Route::has('front.reports.index'))
                    {
                      href: "{{ route('front.reports.index') }}",
                      label: "集計",
                      content: "カード枚数とかイベント最終日とかの集計。",
                    },
                  @endif
                ]
              }))
            })
          </script>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
