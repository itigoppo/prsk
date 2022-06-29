<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
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
                'name' => 'VIRTUAL SINGER',
                'short' => 'VS',
                'bg_color' => '#86cecb',
                'color' => '#ffffff',
            ],
            [
                'name' => 'Leo/need',
                'short' => 'L/n',
                'bg_color' => '#4455dd',
                'color' => '#ffffff',
            ],
            [
                'name' => 'MORE MORE JUMP！',
                'short' => 'mmj',
                'bg_color' => '#88dd44',
                'color' => '#000000',
            ],
            [
                'name' => 'Vivid BAD SQUAD',
                'short' => 'VBS',
                'bg_color' => '#ee1166',
                'color' => '#ffffff',
            ],
            [
                'name' => 'ワンダーランズ×ショウタイム',
                'short' => 'W×S',
                'bg_color' => '#ff9900',
                'color' => '#ffffff',
            ],
            [
                'name' => '25時、ナイトコードで。',
                'short' => '2500',
                'bg_color' => '#884499',
                'color' => '#ffffff',
            ],
        ];

        foreach ($records as $record) {
            $entity = new Unit();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
