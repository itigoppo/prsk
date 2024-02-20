@section('title', 'イベントボーナスポイント計算機')

<x-app-layout>

  <x-slot name="script">
    <script>
      document.addEventListener('alpine:init', () => {
        Alpine.data('card', () => ({
          rarities: [{
              label: "PU★4",
              value: "rarity-pu"
            },
            {
              label: "既存★4",
              value: "rarity-star4"
            },
            {
              label: "BD/Anniv.",
              value: "rarity-bd"
            },
            {
              label: "★3",
              value: "rarity-star3"
            },
            {
              label: "★2",
              value: "rarity-star2"
            },
            {
              label: "★1",
              value: "rarity-star1"
            },
          ],
          attributes: [{
              key: "rarity",
              label: "レアリティ",
              items: [{
                  label: "PU★4",
                  value: "rarity-pu"
                },
                {
                  label: "既存★4",
                  value: "rarity-star4"
                },
                {
                  label: "BD/Anniv.",
                  value: "rarity-bd"
                },
                {
                  label: "★3",
                  value: "rarity-star3"
                },
                {
                  label: "★2",
                  value: "rarity-star2"
                },
                {
                  label: "★1",
                  value: "rarity-star1"
                },
              ]
            },
            {
              key: "master-rank",
              label: "マスラン",
              items: [{
                  label: "0",
                  value: "master-rank-0",
                  checked: true
                },
                {
                  label: "1",
                  value: "master-rank-1"
                },
                {
                  label: "2",
                  value: "master-rank-2"
                },
                {
                  label: "3",
                  value: "master-rank-3"
                },
                {
                  label: "4",
                  value: "master-rank-4"
                },
                {
                  label: "5",
                  value: "master-rank-5"
                },
              ]
            },
            {
              key: "attribute",
              label: "ボーナスタイプ",
              items: [{
                  label: "一致",
                  value: "attribute-on",
                },
                {
                  label: "不一致",
                  value: "attribute-off"
                },
              ]
            },
            {
              key: "character",
              label: "ボーナスキャラクター",
              items: [{
                  label: "一致",
                  value: "character-on",
                },
                {
                  label: "一致(無印バチャシン)",
                  value: "character-vs"
                },
                {
                  label: "不一致",
                  value: "character-off"
                },
              ]
            },
          ],
          colors: [{
              default: "border-wild-watermelon-500 text-wild-watermelon-500 dark:bg-wild-watermelon-500",
              checked: "peer-checked:border-wild-watermelon-500 peer-checked:bg-wild-watermelon-500 dark:peer-checked:text-wild-watermelon-500",
            },
            {
              default: "border-selective-yellow-400 text-selective-yellow-400 dark:bg-selective-yellow-400",
              checked: "peer-checked:border-selective-yellow-400 peer-checked:bg-selective-yellow-400 dark:peer-checked:text-selective-yellow-400",
            },
            {
              default: "border-turquoise-500 text-turquoise-500 dark:bg-turquoise-500",
              checked: "peer-checked:border-turquoise-500 peer-checked:bg-turquoise-500 dark:peer-checked:text-turquoise-500",
            },
            {
              default: "border-picton-blue-400 text-picton-blue-400 dark:bg-picton-blue-400",
              checked: "peer-checked:border-picton-blue-400 peer-checked:bg-picton-blue-400 dark:peer-checked:text-picton-blue-400",
            },
            {
              default: "border-blue-marguerite-500 bg-white text-blue-marguerite-500 dark:bg-blue-marguerite-500",
              checked: "peer-checked:border-blue-marguerite-500 peer-checked:bg-blue-marguerite-500 dark:peer-checked:text-blue-marguerite-500",
            },
          ],
          onClickAttribute(e) {
            const currentId = e.currentTarget.parentElement.parentElement.parentElement.parentElement
              .getAttribute("id")
            const currentInput = e.currentTarget.parentElement.getElementsByTagName("input")[0]
            const currentName = currentInput.getAttribute("name")

            // PUならタイプボーナスとユニットボーナスはかならず一致
            if (currentName === currentId + "-rarity" && currentInput.value === "rarity-pu") {
              document.getElementById(currentId + "-attribute-on").checked = true
              document.getElementById(currentId + "-character-on").checked = true
            }
            this.calc(currentId)

            let bonus = 0
            for (const index in this.colors) {
              const cardId = "card" + index
              const cardResultElm = document.getElementById(cardId).getElementsByClassName("calc")[0]
                .getElementsByTagName(
                  "span")[0]
              bonus = bonus + parseInt(cardResultElm.textContent, 10)
            }

            const bonusResultElm = document.getElementById("bonus")
            bonusResultElm.textContent = bonus
          },
          calc(currentId) {
            const currentResultElm = document.getElementById(currentId).getElementsByClassName("calc")[0]
              .getElementsByTagName(
                "span")[0]

            const rarity = this.getCheckedValue(currentId + "-rarity").replace("rarity-", "")
            const masterRank = this.getCheckedValue(currentId + "-master-rank").replace("master-rank-", "")
            const attribute = this.getCheckedValue(currentId + "-attribute")
            const character = this.getCheckedValue(currentId + "-character")

            let bonus = 0
            if (attribute === "attribute-on") {
              bonus += 25;
            }

            if (character === "character-on") {
              bonus += 25;
            } else if (character === "character-vs") {
              bonus += 20;
            }

            if (rarity === "pu") {
              bonus += 20;
            }

            const rankRate = {
              pu: [10, 12.5, 15, 17, 20, 25],
              star4: [10, 12.5, 15, 17, 20, 25],
              bd: [5, 7, 9, 11, 13, 15],
              star3: [0, 1, 2, 3, 4, 5],
              star2: [0, 0.2, 0.4, 0.6, 0.8, 1],
              star1: [0, 0.1, 0.2, 0.3, 0.4, 0.5],
            };

            if (rankRate[rarity] ?? false) {
              bonus += rankRate[rarity][masterRank];
            }

            currentResultElm.textContent = bonus
          },
          getCheckedValue(name) {
            let value = ""
            for (const elm of document.getElementsByName(name)) {
              if (elm.checked) {
                value = elm.value
              }
            }

            return value
          }
        }))
      })
    </script>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">

          <div class="flex flex-col gap-1 md:flex-row md:flex-wrap" x-data="card()">
            <template x-for="(color, index) in colors" :key="index">
              <div class="md:w-[calc(33.333333%-8px)]" :id="'card' + index">
                <div class="calc" x-html="'カード' + (index + 1) + '：<span>0</span>'"></div>

                <template x-for="(attribute, index2) in attributes" :key="index2">
                  <div class="mb-1">
                    <div class="text-sm" x-text="attribute.label"></div>
                    <div class="flex">
                      <template x-for="(item, index3) in attribute.items" :key="index3">
                        <div>
                          <input type="radio" :name="'card' + index + '-' + attribute.key"
                            :id="'card' + index + '-' + item.value" :value="item.value" class="peer hidden"
                            :checked="(item.checked ?? false ? true : false)" @change="onClickAttribute($event)" />
                          <label :for="'card' + index + '-' + item.value" x-text="item.label"
                            class="block border bg-white p-2 text-xs hover:cursor-pointer peer-checked:text-white dark:border-white dark:text-white dark:peer-checked:border-white dark:peer-checked:bg-white"
                            :class="{
                                [color.default]: true,
                                [color.checked]: true,
                                'rounded-l': index3 === 0,
                                    'ml-[-1px]': index3 !== 0,
                                    'rounded-r': index3 === attribute.items.length - 1
                            }"></label>
                        </div>
                      </template>
                    </div>
                  </div>
                </template>
              </div>
            </template>

            <div class="p-4 md:w-[calc(33.333333%-8px)]">
              <div class="mb-2 flex items-center gap-2 rounded bg-gray-400 p-5 text-sm text-white">
                <x-material-symbol type="rounded" optical-size="20">featured_seasonal_and_gifts</x-material-symbol>
                <div>今回のボーナスポイントは <span id="bonus" class="font-semibold text-sea-pink-600">0</span> !!</div>
              </div>

              <ul class="list-disc text-xs">
                <li><span>ボーナスタイプ一致：</span><span class="font-semibold text-sea-pink-600">+25</span></li>
                <li><span>ボーナスキャラクター一致：</span><span class="font-semibold text-sea-pink-600">+25</span></li>
                <li><span>ボーナスキャラクター一致(無印バチャシン)：</span><span class="font-semibold text-sea-pink-600">+15</span></li>
                <li><span>PUキャラ：</span><span class="font-semibold text-sea-pink-600">+20</span></li>
                <li><span>マスランボーナス</span>
                  <ul class="ml-3">
                    <li><span>★4：</span><span class="font-semibold text-sea-pink-600">+10 / 12.5 / 15 / 17 / 20 /
                        25</span></li>
                    <li><span>BD/Anniv.：</span><span class="font-semibold text-sea-pink-600">+5 / 7 / 9 / 11 / 13 /
                        15</span></li>
                    <li><span>★3：</span><span class="font-semibold text-sea-pink-600">+0 / 1 / 2 / 3 / 4 / 5</span></li>
                    <li><span>★2：</span><span class="font-semibold text-sea-pink-600">+0 / 0.2 / 0.4 / 0.6 / 0.8 /
                        1</span></li>
                    <li><span>★1：</span><span class="font-semibold text-sea-pink-600">+0 / 0.1 / 0.2 / 0.3 / 0.4 /
                        0.5</span></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
