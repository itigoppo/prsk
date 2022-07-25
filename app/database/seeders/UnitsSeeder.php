<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'is_active' => true,
            ],
            [
                'name' => 'Leo/need',
                'short' => 'L/n',
                'bg_color' => '#4455dd',
                'color' => '#ffffff',
                'is_active' => true,
            ],
            [
                'name' => 'MORE MORE JUMP！',
                'short' => 'MMJ',
                'bg_color' => '#88dd44',
                'color' => '#000000',
                'is_active' => true,
            ],
            [
                'name' => 'Vivid BAD SQUAD',
                'short' => 'VBS',
                'bg_color' => '#ee1166',
                'color' => '#ffffff',
                'is_active' => true,
            ],
            [
                'name' => 'ワンダーランズ×ショウタイム',
                'short' => 'W×S',
                'bg_color' => '#ff9900',
                'color' => '#ffffff',
                'is_active' => true,
            ],
            [
                'name' => '25時、ナイトコードで。',
                'short' => '2500',
                'bg_color' => '#884499',
                'color' => '#ffffff',
                'is_active' => true,
            ],
            [
                'name' => 'VOCALOID',
                'short' => 'VO',
                'bg_color' => '#e9ecef',
                'color' => '#000000',
                'is_active' => false,
            ],
        ];

        DB::table('units')->truncate();
        foreach ($records as $record) {
            $entity = new Unit();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
