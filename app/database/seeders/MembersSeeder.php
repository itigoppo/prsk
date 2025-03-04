<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersSeeder extends Seeder
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
                'unit_id' => 1,
                'icon_id' => 1,
                'code' => 'vs_miku',
                'name' => '初音ミク',
                'short' => 'ミク',
                'bg_color' => '#33ccbb',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 1,
                'icon_id' => 2,
                'code' => 'vs_rin',
                'name' => '鏡音リン',
                'short' => 'リン',
                'bg_color' => '#ffcc11',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 1,
                'icon_id' => 3,
                'code' => 'vs_len',
                'name' => '鏡音レン',
                'short' => 'レン',
                'bg_color' => '#ffee11',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 1,
                'icon_id' => 4,
                'code' => 'vs_luka',
                'name' => '巡音ルカ',
                'short' => 'ルカ',
                'bg_color' => '#ffbbcc',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 1,
                'icon_id' => 5,
                'code' => 'vs_meiko',
                'name' => 'MEIKO',
                'short' => 'MEIKO',
                'bg_color' => '#dd4444',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 1,
                'icon_id' => 6,
                'code' => 'vs_kaito',
                'name' => 'KAITO',
                'short' => 'KAITO',
                'bg_color' => '#3366cc',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 41,
                'code' => 'ln_miku',
                'name' => '初音ミク',
                'short' => 'ミク',
                'bg_color' => '#4455dd',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 98,
                'code' => 'ln_rin',
                'name' => '鏡音リン',
                'short' => 'リン',
                'bg_color' => '#4455dd',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 99,
                'code' => 'ln_len',
                'name' => '鏡音レン',
                'short' => 'レン',
                'bg_color' => '#4455dd',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 42,
                'code' => 'ln_luka',
                'name' => '巡音ルカ',
                'short' => 'ルカ',
                'bg_color' => '#4455dd',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 101,
                'code' => 'ln_meiko',
                'name' => 'MEIKO',
                'short' => 'MEIKO',
                'bg_color' => '#4455dd',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 102,
                'code' => 'ln_kaito',
                'name' => 'KAITO',
                'short' => 'KAITO',
                'bg_color' => '#4455dd',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 37,
                'code' => 'ln_ichica',
                'name' => '星乃一歌',
                'short' => '一歌',
                'bg_color' => '#33aaee',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 38,
                'code' => 'ln_saki',
                'name' => '天馬咲希',
                'short' => '咲希',
                'bg_color' => '#ffdd44',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 39,
                'code' => 'ln_honami',
                'name' => '望月穂波',
                'short' => '穂波',
                'bg_color' => '#ee6666',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 2,
                'icon_id' => 40,
                'code' => 'ln_shiho',
                'name' => '日野森志歩',
                'short' => '志歩',
                'bg_color' => '#bbdd22',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 47,
                'code' => 'mmj_miku',
                'name' => '初音ミク',
                'short' => 'ミク',
                'bg_color' => '#88dd44',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 48,
                'code' => 'mmj_rin',
                'name' => '鏡音リン',
                'short' => 'リン',
                'bg_color' => '#88dd44',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 105,
                'code' => 'mmj_len',
                'name' => '鏡音レン',
                'short' => 'レン',
                'bg_color' => '#88dd44',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 106,
                'code' => 'mmj_luka',
                'name' => '巡音ルカ',
                'short' => 'ルカ',
                'bg_color' => '#88dd44',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 107,
                'code' => 'mmj_meiko',
                'name' => 'MEIKO',
                'short' => 'MEIKO',
                'bg_color' => '#88dd44',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 108,
                'code' => 'mmj_kaito',
                'name' => 'KAITO',
                'short' => 'KAITO',
                'bg_color' => '#88dd44',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 43,
                'code' => 'mmj_minori',
                'name' => '花里みのり',
                'short' => 'みのり',
                'bg_color' => '#ffccaa',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 44,
                'code' => 'mmj_haruka',
                'name' => '桐谷遥',
                'short' => '遥',
                'bg_color' => '#99ccff',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 45,
                'code' => 'mmj_airi',
                'name' => '桃井愛莉',
                'short' => '愛莉',
                'bg_color' => '#ffaacc',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 3,
                'icon_id' => 46,
                'code' => 'mmj_shizuku',
                'name' => '日野森雫',
                'short' => '雫',
                'bg_color' => '#99eedd',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 23,
                'code' => 'vbs_miku',
                'name' => '初音ミク',
                'short' => 'ミク',
                'bg_color' => '#ee1166',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 110,
                'code' => 'vbs_rin',
                'name' => '鏡音リン',
                'short' => 'リン',
                'bg_color' => '#ee1166',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 24,
                'code' => 'vbs_len',
                'name' => '鏡音レン',
                'short' => 'レン',
                'bg_color' => '#ee1166',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 112,
                'code' => 'vbs_luka',
                'name' => '巡音ルカ',
                'short' => 'ルカ',
                'bg_color' => '#ee1166',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 25,
                'code' => 'vbs_meiko',
                'name' => 'MEIKO',
                'short' => 'MEIKO',
                'bg_color' => '#ee1166',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 114,
                'code' => 'vbs_kaito',
                'name' => 'KAITO',
                'short' => 'KAITO',
                'bg_color' => '#ee1166',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 19,
                'code' => 'vbs_kohane',
                'name' => '小豆沢こはね',
                'short' => 'こはね',
                'bg_color' => '#ff6699',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 20,
                'code' => 'vbs_an',
                'name' => '白石杏',
                'short' => '杏',
                'bg_color' => '#00bbdd',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 21,
                'code' => 'vbs_akito',
                'name' => '東雲彰人',
                'short' => '彰人',
                'bg_color' => '#ff7722',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 4,
                'icon_id' => 22,
                'code' => 'vbs_toya',
                'name' => '青柳冬弥',
                'short' => '冬弥',
                'bg_color' => '#0077dd',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 90,
                'code' => 'ws_miku',
                'name' => '初音ミク',
                'short' => 'ミク',
                'bg_color' => '#ff9900',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 116,
                'code' => 'ws_rin',
                'name' => '鏡音リン',
                'short' => 'リン',
                'bg_color' => '#ff9900',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 117,
                'code' => 'ws_len',
                'name' => '鏡音レン',
                'short' => 'レン',
                'bg_color' => '#ff9900',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 118,
                'code' => 'ws_luka',
                'name' => '巡音ルカ',
                'short' => 'ルカ',
                'bg_color' => '#ff9900',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 119,
                'code' => 'ws_meiko',
                'name' => 'MEIKO',
                'short' => 'MEIKO',
                'bg_color' => '#ff9900',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 91,
                'code' => 'ws_kaito',
                'name' => 'KAITO',
                'short' => 'KAITO',
                'bg_color' => '#ff9900',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 86,
                'code' => 'ws_tsukasa',
                'name' => '天馬司',
                'short' => '司',
                'bg_color' => '#ffbb00',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 87,
                'code' => 'ws_emu',
                'name' => '鳳えむ',
                'short' => 'えむ',
                'bg_color' => '#ff66bb',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 88,
                'code' => 'ws_nene',
                'name' => '草薙寧々',
                'short' => '寧々',
                'bg_color' => '#33dd99',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 5,
                'icon_id' => 89,
                'code' => 'ws_rui',
                'name' => '神代類',
                'short' => '類',
                'bg_color' => '#bb88ee',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 96,
                'code' => '25_miku',
                'name' => '初音ミク',
                'short' => 'ミク',
                'bg_color' => '#884499',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 122,
                'code' => '25_rin',
                'name' => '鏡音リン',
                'short' => 'リン',
                'bg_color' => '#884499',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 123,
                'code' => '25_len',
                'name' => '鏡音レン',
                'short' => 'レン',
                'bg_color' => '#884499',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 124,
                'code' => '25_luka',
                'name' => '巡音ルカ',
                'short' => 'ルカ',
                'bg_color' => '#884499',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 125,
                'code' => '25_meiko',
                'name' => 'MEIKO',
                'short' => 'MEIKO',
                'bg_color' => '#884499',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 126,
                'code' => '25_kaito',
                'name' => 'KAITO',
                'short' => 'KAITO',
                'bg_color' => '#884499',
                'color' => '#ffffff',
                'is_active' => 0,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 92,
                'code' => '25_kanade',
                'name' => '宵崎奏',
                'short' => '奏',
                'bg_color' => '#bb6688',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 93,
                'code' => '25_mafuyu',
                'name' => '朝比奈まふゆ',
                'short' => 'まふゆ',
                'bg_color' => '#8888cc',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 94,
                'code' => '25_ena',
                'name' => '東雲絵名',
                'short' => '絵名',
                'bg_color' => '#ccaa88',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 6,
                'icon_id' => 95,
                'code' => '25_mizuki',
                'name' => '暁山瑞希',
                'short' => '瑞希',
                'bg_color' => '#ddaacc',
                'color' => '#ffffff',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'vo_gumi',
                'name' => 'GUMI',
                'short' => 'GUMI',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'vo_flower',
                'name' => 'flower',
                'short' => 'flower',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'vo_ia',
                'name' => 'IA',
                'short' => 'IA',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'vo_vy2v3',
                'name' => 'VY2V3',
                'short' => 'VY2V3',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'vo_una',
                'name' => '音街ウナ',
                'short' => 'ウナ',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'vo_yuki',
                'name' => '歌愛ユキ',
                'short' => 'ユキ',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'ro_miku_d',
                'name' => 'ミクダヨー',
                'short' => 'ミクダヨー',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'ro_nene',
                'name' => 'ネネロボ',
                'short' => 'ネネロボ',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'vo_kafu',
                'name' => '可不',
                'short' => '可不',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
            [
                'unit_id' => 7,
                'icon_id' => NULL,
                'code' => 'vo_gackpo',
                'name' => '神威がくぽ',
                'short' => 'がくぽ',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => 1,
            ],
        ];

        DB::table('members')->truncate();
        foreach ($records as $record) {
            $entity = new Member();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
