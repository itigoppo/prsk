@section('title', 'キャラソート')

<x-app-layout>

  <x-slot name="script">
    <script>
      document.addEventListener('alpine:init', () => {
        Alpine.data('sortBattle', () => ({
          token: '',
          members: [],
          isFinish: false,
          player1: {
            icon: '',
            name: '',
          },
          player2: {
            icon: '',
            name: '',
          },
          battleNumber: 0,
          rate: 0,
          sortMembers: [],
          parent: [],
          totalSize: 0,
          finishSize: 0,
          nrec: 0,
          cmp1: 0,
          cmp2: 0,
          rec: [],
          equal: [],
          head1: 0,
          head2: 0,
          resultMembers: [],
          async init() {
            await this.login()
            await this.load()
            await this.battleInit()
            this.changeBattle()
          },
          async login() {
            const url = new URL("{{ config('app.url') }}/api/login")
            try {
              const response = await axios.post(url);
              // console.log(response);
              this.token = response.data.token
            } catch (error) {
              console.error(error)
            }
          },
          async load() {
            const url = new URL("{{ config('app.url') }}/api/members")
            try {
              const response = await axios.get(url, {
                headers: {
                  Authorization: `Bearer ${this.token}`,
                }
              });
              // console.log(response);
              this.members = await response.data.data
            } catch (error) {
              console.error(error)
            }
          },
          battleInit() {
            let cnt1 = 0
            this.sortMembers[cnt1] = [];
            for (let cnt2 = 0; cnt2 < this.members.length; cnt2++) {
              this.sortMembers[cnt1][cnt2] = cnt2
            }
            this.parent[cnt1] = -1
            this.totalSize = 0
            cnt1++

            for (let cnt3 = 0; cnt3 < this.sortMembers.length; cnt3++) {
              if (this.sortMembers[cnt3].length >= 2) {
                const mid = Math.ceil(this.sortMembers[cnt3].length / 2);
                this.sortMembers[cnt1] = []
                this.sortMembers[cnt1] = this.sortMembers[cnt3].slice(0, mid)
                this.totalSize += this.sortMembers[cnt1].length
                this.parent[cnt1] = cnt3
                cnt1++
                this.sortMembers[cnt1] = []
                this.sortMembers[cnt1] = this.sortMembers[cnt3].slice(mid, this.sortMembers[cnt3].length)
                this.totalSize += this.sortMembers[cnt1].length
                this.parent[cnt1] = cnt3
                cnt1++
              }
            }

            for (let cnt4 = 0; cnt4 < this.members.length; cnt4++) {
              this.rec[cnt4] = 0
            }
            this.nrec = 0

            for (let cnt5 = 0; cnt5 < this.members.length; cnt5++) {
              this.equal[cnt5] = -1
            }

            this.cmp1 = this.sortMembers.length - 2
            this.cmp2 = this.sortMembers.length - 1
          },
          changeBattle() {
            const key1 = this.sortMembers[this.cmp1][this.head1]
            const key2 = this.sortMembers[this.cmp2][this.head2]
            this.player1 = this.members[key1]
            this.player2 = this.members[key2]
            this.battleNumber++
          },
          changeProgress() {
            this.rate = Math.floor(this.finishSize * 100 / this.totalSize)
          },
          calc(index) {
            if (index < 0) {
              this.rec[this.nrec] = this.sortMembers[this.cmp1][this.head1]
              this.head1++
              this.nrec++
              this.finishSize++
              while (this.equal[this.rec[this.nrec - 1]] !== -1) {
                this.rec[this.nrec] = this.sortMembers[this.cmp1][this.head1]
                this.head1++
                this.nrec++
                this.finishSize++
              }
            } else if (index > 0) {
              this.rec[this.nrec] = this.sortMembers[this.cmp2][this.head2]
              this.head2++
              this.nrec++
              this.finishSize++
              while (this.equal[this.rec[this.nrec - 1]] !== -1) {
                this.rec[this.nrec] = this.sortMembers[this.cmp2][this.head2]
                this.head2++
                this.nrec++
                this.finishSize++
              }
            } else {
              this.rec[this.nrec] = this.sortMembers[this.cmp1][this.head1]
              this.head1++
              this.nrec++
              this.finishSize++
              while (this.equal[this.rec[this.nrec - 1]] !== -1) {
                this.rec[this.nrec] = this.sortMembers[this.cmp1][this.head1]
                this.head1++
                this.nrec++
                this.finishSize++
              }
              this.equal[this.rec[this.nrec - 1]] = this.sortMembers[this.cmp2][this.head2]
              this.rec[this.nrec] = this.sortMembers[this.cmp2][this.head2]
              this.head2++
              this.nrec++
              this.finishSize++
              while (this.equal[this.rec[this.nrec - 1]] !== -1) {
                this.rec[this.nrec] = this.sortMembers[this.cmp2][this.head2]
                this.head2++
                this.nrec++
                this.finishSize++
              }
            }

            if (
              this.head1 < this.sortMembers[this.cmp1].length &&
              this.head2 === this.sortMembers[this.cmp2].length
            ) {
              while (this.head1 < this.sortMembers[this.cmp1].length) {
                this.rec[this.nrec] = this.sortMembers[this.cmp1][this.head1]
                this.head1++
                this.nrec++
                this.finishSize++
              }
            } else if (
              this.head1 === this.sortMembers[this.cmp1].length &&
              this.head2 < this.sortMembers[this.cmp2].length
            ) {
              while (this.head2 < this.sortMembers[this.cmp2].length) {
                this.rec[this.nrec] = this.sortMembers[this.cmp2][this.head2]
                this.head2++
                this.nrec++
                this.finishSize++
              }
            }

            if (
              this.head1 === this.sortMembers[this.cmp1].length &&
              this.head2 === this.sortMembers[this.cmp2].length
            ) {
              for (
                let cnt1 = 0; cnt1 < this.sortMembers[this.cmp1].length + this.sortMembers[this.cmp2]
                .length; cnt1++
              ) {
                this.sortMembers[this.parent[this.cmp1]][cnt1] = this.rec[cnt1]
              }
              this.sortMembers.pop()
              this.sortMembers.pop()
              this.cmp1 = this.cmp1 - 2
              this.cmp2 = this.cmp2 - 2
              this.head1 = 0
              this.head2 = 0

              if (this.head1 === 0 && this.head2 === 0) {
                for (let cnt2 = 0; cnt2 < this.members.length; cnt2++) {
                  this.rec[cnt2] = 0
                }
                this.nrec = 0
              }
            }
            if (this.cmp1 < 0) {
              this.changeProgress()
              this.resultBattle()
              this.isFinish = true;
            } else {
              this.changeBattle()
              this.changeProgress()
            }
          },
          resultBattle() {
            let ranking = 1;
            let sameRank = 1;
            for (let cnt1 = 0; cnt1 < this.members.length; cnt1++) {
              this.resultMembers.push({
                ranking,
                member: this.members[this.sortMembers[0][cnt1]]
              })
              if (cnt1 < this.members.length - 1) {
                if (this.equal[this.sortMembers[0][cnt1]] === this.sortMembers[0][cnt1 + 1]) {
                  sameRank++;
                } else {
                  ranking += sameRank;
                  sameRank = 1;
                }
              }
            }
          },
          onClickedPlayer1() {
            if (!this.isFinish) {
              this.calc(-1);
            }
          },
          onClickedPlayer2() {
            if (!this.isFinish) {
              this.calc(1);
            }
          },
          onClickedDraw() {
            if (!this.isFinish) {
              this.calc(0);
            }
          }
        }))
      })
    </script>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100" x-data="sortBattle()">

          <div class="my-8 flex justify-center space-x-4" x-show="Object.keys(members).length == 0">
            <div class="h-2 w-2 animate-ping rounded-full bg-wild-watermelon-400"></div>
            <div class="h-2 w-2 animate-ping rounded-full bg-selective-yellow-400"></div>
            <div class="h-2 w-2 animate-ping rounded-full bg-turquoise-400"></div>
            <div class="h-2 w-2 animate-ping rounded-full bg-picton-blue-400"></div>
            <div class="h-2 w-2 animate-ping rounded-full bg-blue-marguerite-400"></div>
          </div>

          <div class="mx-auto max-w-xl space-y-4" x-show="Object.keys(members).length > 0">
            <div class="rounded bg-selective-yellow-100 px-4 py-2 text-center text-sm">
              今<span x-html="battleNumber"></span>回目の選択 進捗<span x-html="rate"></span>%
            </div>

            <div class="space-y-4">
              <div class="text-center text-sm">
                好きな方（または引き分け）を選択してください。
              </div>

              <div class="rounded bg-gray-100">
                <div class="rounded bg-wild-watermelon-400 p-0.5 text-center text-xs leading-none text-white"
                  :style="`width: ${rate}%`">
                  <span x-html="rate"></span>%
                </div>
              </div>
            </div>

            <div class="flex justify-center">
              <div class="relative h-40 w-1/2 bg-flamenco-300 text-end"
                :class="{ 'hover:cursor-not-allowed': isFinish, 'hover:cursor-pointer': !isFinish }"
                @click="onClickedPlayer1">
                <div class="absolute right-4 flex h-40 w-40 items-center justify-center bg-flamenco-400">
                  <img :src="player1.icon" class="h-40 w-40 object-cover" />
                  <div class="absolute bottom-0 w-full bg-gray-950/60 p-1 text-start text-xs text-white"
                    x-html="player1.name">
                  </div>
                </div>
              </div>
              <div class="relative h-40 w-1/2 bg-scooter-300"
                :class="{ 'hover:cursor-not-allowed': isFinish, 'hover:cursor-pointer': !isFinish }"
                @click="onClickedPlayer2">
                <div class="absolute left-4 h-40 w-40 items-center justify-center bg-scooter-400">
                  <img :src="player2.icon" class="h-40 w-40 object-cover" />
                  <div class="absolute bottom-0 w-full bg-gray-950/60 p-1 text-start text-xs text-white"
                    x-html="player2.name">
                  </div>
                </div>
              </div>
            </div>

            <div class="flex justify-center space-x-4">
              <div x-show="!isFinish" @click="onClickedDraw">
                <x-button-surface mode="front" size="sm">
                  引き分け
                </x-button-surface>
              </div>
              <div x-show="isFinish">
                <x-button-surface mode="front" size="sm" type="disabled" disabled="true">
                  引き分け
                </x-button-surface>
              </div>
              <a href="{{ route('front.character-sort') }}" class="inline-block">
                <x-button-surface type="outline" mode="front" size="sm">
                  リセット
                </x-button-surface>
              </a>
            </div>
          </div>

          <div class="my-4 space-y-2 md:mt-8" x-show="Object.keys(members).length > 0 && !isFinish">
            <div class="text-sm">
              チェック対象メンバー
              <span x-text="Object.keys(members).length"></span>
              人
            </div>
            <div class="grid grid-cols-6 gap-2 md:grid-cols-10">
              <template x-for="(member, index) in members" :key="index">
                <div
                  class="grid grid-rows-[auto_1fr] overflow-hidden rounded shadow-[4px_4px_16px_0px_rgba(0,_0,_0,_0.08),_0px_0px_2px_0px_rgba(0,_0,_0,_0.25)]">
                  <div class="bg-gray-50">
                    <img :src="member.icon" class="aspect-square w-full object-contain" />
                  </div>

                  <div class="flex justify-center space-x-1 p-2">
                    <span x-data="{ color: member.bgColor }" :style="`color: ${color}`">
                      <x-material-symbol type="rounded" optical-size="16">energy_program_saving</x-material-symbol>
                    </span>
                    <span class="break-all text-xs" x-html="member.name"></span>
                  </div>
                </div>
              </template>
            </div>
          </div>

          <div class="my-4 md:mt-8" x-show="Object.keys(resultMembers).length > 0 && isFinish">
            <div
              class="flex h-10 w-full items-center space-x-1 rounded-t-md border border-gray-700 bg-gray-100 px-2 text-xs font-bold md:px-8">
              <div class="w-20">順位</div>
              <div class="w-24"></div>
              <div>メンバー</div>
            </div>
            <template x-for="({ ranking, member }, index) in resultMembers" :key="index">
              <div
                class="min-h-10 flex w-full items-center space-x-1 border-x border-b border-gray-700 bg-white px-2 text-sm last:rounded-b-md md:px-8">
                <div class="w-20" x-text="ranking"></div>
                <div class="flex w-24 justify-center">
                  <div class="bg-gray-50">
                    <img :src="member.icon" class="aspect-square w-20 object-contain" />
                  </div>
                </div>
                <div class="flex items-center space-x-1 px-1">
                  <span x-data="{ color: member.bgColor }" :style="`color: ${color}`">
                    <x-material-symbol type="rounded" optical-size="20">energy_program_saving</x-material-symbol>
                  </span>
                  <span x-html="member.name"></span>
                  <span x-html="`(${member.unit.name})`"></span>
                </div>
              </div>
            </template>
          </div>

        </div>
      </div>
    </div>
  </div>
</x-app-layout>
