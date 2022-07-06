<?php

namespace Database\Seeders;

use App\Models\ChangeLog;
use Illuminate\Database\Seeder;

class ChangeLogsSeeder extends Seeder
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
                'released_at' => '2021-12-28 00:00:00',
                'type' => 'interaction',
                'note' => "11月イベント「揺るがぬ想い、今言葉にして」「バディ・ファニー・スペンドタイム♪」まで。\n(レオニ×レン、みのり-杏、遥-こはね)",
            ],
            [
                'released_at' => '2022-01-04 00:00:00',
                'type' => 'interaction',
                'note' => "12月イベント「交わる旋律 灯るぬくもり」「MOREMOREMakingXmas」「Same Dreams,Same Colors」まで。\n(一歌-奏、一歌-まふゆ、穂波-まふゆ、モモジャン×KAITO、ビビバス×ルカ)",
            ],
            [
                'released_at' => '2022-03-30 00:00:00',
                'type' => 'interaction',
                'note' => "2月イベント「秘密の♡バレンタイン大作戦！」まで。\n(愛莉-えむ)\nキズナボイス(絵名と瑞希1)",
            ],
            [
                'released_at' => '2022-05-31 00:00:00',
                'type' => 'interaction',
                'note' => "6月イベント「青空に願うユア・ハピネス！」まで。\n(愛莉-こはね、雫-こはね、愛莉-杏、雫-杏)",
            ],
        ];

        foreach ($records as $record) {
            $entity = new ChangeLog();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
