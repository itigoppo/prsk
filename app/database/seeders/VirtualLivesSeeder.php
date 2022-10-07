<?php

namespace Database\Seeders;

use App\Models\VirtualLive;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VirtualLivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [
            [
                'starts_at' => '2020-09-30 18:00:00',
                'ends_at' => '2020-10-01 12:00:00',
                'name' => "リリース記念ライブ バーチャル・シンガー",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-01 18:00:00',
                'ends_at' => '2020-10-02 12:00:00',
                'name' => "リリース記念ライブ Leo/need",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-02 18:00:00',
                'ends_at' => '2020-10-03 12:00:00',
                'name' => "リリース記念ライブ MORE MORE JUMP！",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-03 18:00:00',
                'ends_at' => '2020-10-04 12:00:00',
                'name' => "リリース記念ライブ Vivid BAD SQUAD",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-04 18:00:00',
                'ends_at' => '2020-10-05 12:00:00',
                'name' => "リリース記念ライブ ワンダーランズ×ショウタイム",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-05 0:00:00',
                'ends_at' => '2020-10-05 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 遥",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-05 18:00:00',
                'ends_at' => '2020-10-06 12:00:00',
                'name' => "リリース記念ライブ 25時、ナイトコードで。",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-06 18:00:00',
                'ends_at' => '2020-10-07 12:00:00',
                'name' => "リリース記念ライブ オールスター",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-18 22:00:00',
                'ends_at' => '2020-10-19 21:00:00',
                'name' => "雨上がりの一番星 アフターライブ",
                'event_id' => 1,
            ],
            [
                'starts_at' => '2020-10-27 0:00:00',
                'ends_at' => '2020-10-27 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 穂波",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-10-29 22:00:00',
                'ends_at' => '2020-10-30 21:00:00',
                'name' => "囚われのマリオネット アフターライブ",
                'event_id' => 2,
            ],
            [
                'starts_at' => '2020-10-31 0:00:00',
                'ends_at' => '2020-11-01 23:00:00',
                'name' => "ハロウィン2020ライブ",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-01 0:00:00',
                'ends_at' => '2020-11-01 23:00:00',
                'name' => "ウェルカムライブ バーチャル・シンガー",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-02 0:00:00',
                'ends_at' => '2020-11-02 23:00:00',
                'name' => "ウェルカムライブ Leo/need",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-03 0:00:00',
                'ends_at' => '2020-11-03 23:00:00',
                'name' => "ウェルカムライブ MORE MORE JUMP！",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-04 0:00:00',
                'ends_at' => '2020-11-04 23:00:00',
                'name' => "ウェルカムライブ Vivid BAD SQUAD",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-05 0:00:00',
                'ends_at' => '2020-11-05 23:00:00',
                'name' => "HAPPY ANNIVERSARYライブ MEIKO",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-05 0:00:00',
                'ends_at' => '2020-11-05 23:00:00',
                'name' => "ウェルカムライブ ワンダーランズ×ショウタイム",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-06 0:00:00',
                'ends_at' => '2020-11-06 23:00:00',
                'name' => "ウェルカムライブ 25時、ナイトコードで。",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-07 0:00:00',
                'ends_at' => '2020-11-07 23:00:00',
                'name' => "ウェルカムライブ オールスター",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-07 22:00:00',
                'ends_at' => '2020-11-08 21:00:00',
                'name' => "全力！ワンダーハロウィン！ アフターライブ",
                'event_id' => 3,
            ],
            [
                'starts_at' => '2020-11-12 0:00:00',
                'ends_at' => '2020-11-12 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 彰人",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-11-28 22:00:00',
                'ends_at' => '2020-11-29 21:00:00',
                'name' => "ここからRE:START！ アフターライブ",
                'event_id' => 5,
            ],
            [
                'starts_at' => '2020-12-06 0:00:00',
                'ends_at' => '2020-12-06 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 雫",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-12-08 22:00:00',
                'ends_at' => '2020-12-09 21:00:00',
                'name' => "いつか、背中あわせのリリックを アフターライブ",
                'event_id' => 6,
            ],
            [
                'starts_at' => '2020-12-24 0:00:00',
                'ends_at' => '2020-12-25 23:00:00',
                'name' => "クリスマス2020ライブ",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-12-27 0:00:00',
                'ends_at' => '2020-12-27 23:00:00',
                'name' => "HAPPY ANNIVERSARYライブ リン",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-12-27 0:00:00',
                'ends_at' => '2020-12-27 23:30:00',
                'name' => "HAPPY ANNIVERSARYライブ レン",
                'event_id' => null,
            ],
            [
                'starts_at' => '2020-12-29 22:00:00',
                'ends_at' => '2020-12-30 21:00:00',
                'name' => "聖なる夜に、この歌声を アフターライブ",
                'event_id' => 8,
            ],
            [
                'starts_at' => '2020-12-31 23:52:00',
                'ends_at' => '2021-01-01 23:00:00',
                'name' => "2021カウントダウンライブ",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-01-01 18:00:00',
                'ends_at' => '2021-01-02 12:00:00',
                'name' => "2021ハッピーニューイヤーライブ　Leo/need",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-01-02 18:00:00',
                'ends_at' => '2021-01-03 12:00:00',
                'name' => "2021ハッピーニューイヤーライブ　MORE MORE JUMP！",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-01-03 18:00:00',
                'ends_at' => '2021-01-04 12:00:00',
                'name' => "2021ハッピーニューイヤーライブ　Vivid BAD SQUAD",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-01-04 18:00:00',
                'ends_at' => '2021-01-05 12:00:00',
                'name' => "2021ハッピーニューイヤーライブ　ワンダーランズ×ショウタイム",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-01-05 18:00:00',
                'ends_at' => '2021-01-06 12:00:00',
                'name' => "2021ハッピーニューイヤーライブ　25時、ナイトコードで。",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-01-08 0:00:00',
                'ends_at' => '2021-01-08 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 志歩",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-01-19 22:00:00',
                'ends_at' => '2021-01-20 21:00:00',
                'name' => "揺れるまま、でも君は前へ アフターライブ",
                'event_id' => 10,
            ],
            [
                'starts_at' => '2021-01-27 0:00:00',
                'ends_at' => '2021-01-27 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ まふゆ",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-01-29 22:00:00',
                'ends_at' => '2021-01-30 21:00:00',
                'name' => "Color of Myself！ アフターライブ",
                'event_id' => 11,
            ],
            [
                'starts_at' => '2021-01-30 0:00:00',
                'ends_at' => '2021-01-30 23:00:00',
                'name' => "HAPPY ANNIVERSARYライブ ルカ",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-02-07 22:00:00',
                'ends_at' => '2021-02-08 21:00:00',
                'name' => "Period of NOCTURNE アフターライブ",
                'event_id' => 12,
            ],
            [
                'starts_at' => '2021-02-10 0:00:00',
                'ends_at' => '2021-02-10 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 奏",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-02-14 0:00:00',
                'ends_at' => '2021-02-15 23:00:00',
                'name' => "バレンタイン2021ライブ",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-02-17 0:00:00',
                'ends_at' => '2021-02-17 23:00:00',
                'name' => "HAPPY ANNIVERSARYライブ KAITO",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-02-26 22:00:00',
                'ends_at' => '2021-02-27 21:00:00',
                'name' => "満たされないペイルカラー アフターライブ",
                'event_id' => 14,
            ],
            [
                'starts_at' => '2021-03-02 0:00:00',
                'ends_at' => '2021-03-02 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ こはね",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-03-08 22:00:00',
                'ends_at' => '2021-03-09 21:00:00',
                'name' => "スマイルオブドリーマー アフターライブ",
                'event_id' => 15,
            ],
            [
                'starts_at' => '2021-03-14 0:00:00',
                'ends_at' => '2021-03-15 23:00:00',
                'name' => "ホワイトデー2021ライブ",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-03-19 0:00:00',
                'ends_at' => '2021-03-19 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 愛莉",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-03-20 22:00:00',
                'ends_at' => '2021-03-21 21:00:00',
                'name' => "天馬さんちのひな祭り アフターライブ",
                'event_id' => 16,
            ],
            [
                'starts_at' => '2021-03-30 22:00:00',
                'ends_at' => '2021-03-31 21:00:00',
                'name' => "届け！HOPEFUL STAGE♪ アフターライブ",
                'event_id' => 17,
            ],
            [
                'starts_at' => '2021-04-09 22:00:00',
                'ends_at' => '2021-04-10 21:00:00',
                'name' => "君と歌う、桜舞う世界で アフターライブ",
                'event_id' => 18,
            ],
            [
                'starts_at' => '2021-04-14 0:00:00',
                'ends_at' => '2021-04-14 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ みのり",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-04-19 22:00:00',
                'ends_at' => '2021-04-20 21:00:00',
                'name' => "シークレット・ディスタンス アフターライブ",
                'event_id' => 19,
            ],
            [
                'starts_at' => '2021-04-28 22:00:00',
                'ends_at' => '2021-04-29 21:00:00',
                'name' => "Resonate with you アフターライブ",
                'event_id' => 20,
            ],
            [
                'starts_at' => '2021-04-30 0:00:00',
                'ends_at' => '2021-04-30 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 絵名",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-05-08 22:00:00',
                'ends_at' => '2021-05-09 21:00:00',
                'name' => "STRAY BAD DOG アフターライブ",
                'event_id' => 21,
            ],
            [
                'starts_at' => '2021-05-09 0:00:00',
                'ends_at' => '2021-05-09 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 咲希",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-05-17 0:00:00',
                'ends_at' => '2021-05-17 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 司",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-05-19 22:00:00',
                'ends_at' => '2021-05-20 21:00:00',
                'name' => "お悩み聞かせて！わくわくピクニック アフターライブ",
                'event_id' => 22,
            ],
            [
                'starts_at' => '2021-05-25 0:00:00',
                'ends_at' => '2021-05-25 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 冬弥",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-05-29 22:00:00',
                'ends_at' => '2021-05-30 21:00:00',
                'name' => "頑張るあなたにBreak Time！ アフターライブ",
                'event_id' => 23,
            ],
            [
                'starts_at' => '2021-06-09 22:00:00',
                'ends_at' => '2021-06-10 21:00:00',
                'name' => "純白の貴方へ、誓いの歌を！ アフターライブ",
                'event_id' => 24,
            ],
            [
                'starts_at' => '2021-06-19 22:00:00',
                'ends_at' => '2021-06-20 21:00:00',
                'name' => "ワンダーマジカルショウタイム！ アフターライブ",
                'event_id' => 25,
            ],
            [
                'starts_at' => '2021-06-24 0:00:00',
                'ends_at' => '2021-06-24 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 類",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-06-28 22:00:00',
                'ends_at' => '2021-06-29 21:00:00',
                'name' => "カーネーション・リコレクション アフターライブ",
                'event_id' => 26,
            ],
            [
                'starts_at' => '2021-07-07 0:00:00',
                'ends_at' => '2021-07-08 23:00:00',
                'name' => "七夕2021ライブ",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-07-07 22:00:00',
                'ends_at' => '2021-07-08 21:00:00',
                'name' => "Unnamed Harmony アフターライブ",
                'event_id' => 27,
            ],
            [
                'starts_at' => '2021-07-18 22:00:00',
                'ends_at' => '2021-07-19 21:00:00',
                'name' => "Awakening Beat アフターライブ",
                'event_id' => 28,
            ],
            [
                'starts_at' => '2021-07-20 0:00:00',
                'ends_at' => '2021-07-20 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 寧々",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-07-26 0:00:00',
                'ends_at' => '2021-07-26 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 杏",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-07-29 22:00:00',
                'ends_at' => '2021-07-30 21:00:00',
                'name' => "夏祭り、鳴り響く音は アフターライブ",
                'event_id' => 29,
            ],
            [
                'starts_at' => '2021-08-08 22:00:00',
                'ends_at' => '2021-08-09 21:00:00',
                'name' => "きっと最高のsummer！ アフターライブ",
                'event_id' => 30,
            ],
            [
                'starts_at' => '2021-08-11 0:00:00',
                'ends_at' => '2021-08-11 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 一歌",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-08-18 22:00:00',
                'ends_at' => '2021-08-19 21:00:00',
                'name' => "ハッピー・ラブリー・エブリデイ！ アフターライブ",
                'event_id' => 31,
            ],
            [
                'starts_at' => '2021-08-27 0:00:00',
                'ends_at' => '2021-08-27 23:00:00',
                'name' => "HAPPY BIRTHDAYライブ 瑞希",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-08-29 22:00:00',
                'ends_at' => '2021-08-30 21:00:00',
                'name' => "マーメイドにあこがれて アフターライブ",
                'event_id' => 32,
            ],
            [
                'starts_at' => '2021-08-31 0:00:00',
                'ends_at' => '2021-08-31 23:00:00',
                'name' => "HAPPY ANNIVERSARYライブ ミク",
                'event_id' => null,
            ],
            [
                'starts_at' => '2021-09-08 22:00:00',
                'ends_at' => '2021-09-09 21:00:00',
                'name' => "ふたり、月うさぎ アフターライブ",
                'event_id' => 33,
            ],
        ];

        DB::table('virtual_lives')->truncate();
        foreach ($records as $record) {
            $entity = new VirtualLive();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
