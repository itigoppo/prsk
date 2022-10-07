<?php

namespace Database\Seeders;

use App\Models\VirtualLiveTune;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VirtualLiveTunesSeeder extends Seeder
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
                'virtual_live_id' => 1,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 1,
                'tune_id' =>  15,
            ],
            [
                'virtual_live_id' => 1,
                'tune_id' =>  17,
            ],
            [
                'virtual_live_id' => 2,
                'tune_id' => 7,
            ],
            [
                'virtual_live_id' => 2,
                'tune_id' =>  22,
            ],
            [
                'virtual_live_id' => 3,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 3,
                'tune_id' =>  23,
            ],
            [
                'virtual_live_id' => 4,
                'tune_id' => 13,
            ],
            [
                'virtual_live_id' => 4,
                'tune_id' =>  24,
            ],
            [
                'virtual_live_id' => 5,
                'tune_id' => 25,
            ],
            [
                'virtual_live_id' => 5,
                'tune_id' =>  17,
            ],
            [
                'virtual_live_id' => 6,
                'tune_id' => 30,
            ],
            [
                'virtual_live_id' => 7,
                'tune_id' => 21,
            ],
            [
                'virtual_live_id' => 7,
                'tune_id' =>  26,
            ],
            [
                'virtual_live_id' => 8,
                'tune_id' => 1,
            ],
            [
                'virtual_live_id' => 8,
                'tune_id' =>  28,
            ],
            [
                'virtual_live_id' => 8,
                'tune_id' =>  27,
            ],
            [
                'virtual_live_id' => 9,
                'tune_id' => 46,
            ],
            [
                'virtual_live_id' => 10,
                'tune_id' => 22,
            ],
            [
                'virtual_live_id' => 11,
                'tune_id' => 26,
            ],
            [
                'virtual_live_id' => 12,
                'tune_id' => 49,
            ],
            [
                'virtual_live_id' => 12,
                'tune_id' =>  17,
            ],
            [
                'virtual_live_id' => 13,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 13,
                'tune_id' =>  15,
            ],
            [
                'virtual_live_id' => 13,
                'tune_id' =>  17,
            ],
            [
                'virtual_live_id' => 14,
                'tune_id' => 7,
            ],
            [
                'virtual_live_id' => 14,
                'tune_id' =>  22,
            ],
            [
                'virtual_live_id' => 15,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 15,
                'tune_id' =>  23,
            ],
            [
                'virtual_live_id' => 16,
                'tune_id' => 13,
            ],
            [
                'virtual_live_id' => 16,
                'tune_id' =>  24,
            ],
            [
                'virtual_live_id' => 17,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 18,
                'tune_id' => 25,
            ],
            [
                'virtual_live_id' => 18,
                'tune_id' =>  17,
            ],
            [
                'virtual_live_id' => 19,
                'tune_id' => 21,
            ],
            [
                'virtual_live_id' => 19,
                'tune_id' =>  26,
            ],
            [
                'virtual_live_id' => 20,
                'tune_id' => 1,
            ],
            [
                'virtual_live_id' => 20,
                'tune_id' =>  28,
            ],
            [
                'virtual_live_id' => 20,
                'tune_id' =>  27,
            ],
            [
                'virtual_live_id' => 21,
                'tune_id' => 51,
            ],
            [
                'virtual_live_id' => 22,
                'tune_id' => 15,
            ],
            [
                'virtual_live_id' => 23,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 24,
                'tune_id' => 12,
            ],
            [
                'virtual_live_id' => 25,
                'tune_id' => 58,
            ],
            [
                'virtual_live_id' => 26,
                'tune_id' => 59,
            ],
            [
                'virtual_live_id' => 26,
                'tune_id' =>  1,
            ],
            [
                'virtual_live_id' => 27,
                'tune_id' => 17,
            ],
            [
                'virtual_live_id' => 28,
                'tune_id' => 15,
            ],
            [
                'virtual_live_id' => 29,
                'tune_id' => 25,
            ],
            [
                'virtual_live_id' => 30,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 30,
                'tune_id' =>  58,
            ],
            [
                'virtual_live_id' => 30,
                'tune_id' =>  1,
            ],
            [
                'virtual_live_id' => 31,
                'tune_id' => 7,
            ],
            [
                'virtual_live_id' => 31,
                'tune_id' =>  22,
            ],
            [
                'virtual_live_id' => 32,
                'tune_id' => 30,
            ],
            [
                'virtual_live_id' => 32,
                'tune_id' =>  23,
            ],
            [
                'virtual_live_id' => 33,
                'tune_id' => 13,
            ],
            [
                'virtual_live_id' => 33,
                'tune_id' =>  24,
            ],
            [
                'virtual_live_id' => 34,
                'tune_id' => 51,
            ],
            [
                'virtual_live_id' => 34,
                'tune_id' =>  25,
            ],
            [
                'virtual_live_id' => 35,
                'tune_id' => 21,
            ],
            [
                'virtual_live_id' => 35,
                'tune_id' =>  26,
            ],
            [
                'virtual_live_id' => 36,
                'tune_id' => 8,
            ],
            [
                'virtual_live_id' => 37,
                'tune_id' => 57,
            ],
            [
                'virtual_live_id' => 38,
                'tune_id' => 26,
            ],
            [
                'virtual_live_id' => 39,
                'tune_id' => 74,
            ],
            [
                'virtual_live_id' => 40,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 41,
                'tune_id' => 15,
            ],
            [
                'virtual_live_id' => 42,
                'tune_id' => 26,
            ],
            [
                'virtual_live_id' => 43,
                'tune_id' => 35,
            ],
            [
                'virtual_live_id' => 43,
                'tune_id' =>  17,
            ],
            [
                'virtual_live_id' => 44,
                'tune_id' => 15,
            ],
            [
                'virtual_live_id' => 45,
                'tune_id' => 81,
            ],
            [
                'virtual_live_id' => 46,
                'tune_id' => 58,
            ],
            [
                'virtual_live_id' => 47,
                'tune_id' => 25,
            ],
            [
                'virtual_live_id' => 48,
                'tune_id' => 46,
            ],
            [
                'virtual_live_id' => 48,
                'tune_id' =>  1,
            ],
            [
                'virtual_live_id' => 49,
                'tune_id' => 23,
            ],
            [
                'virtual_live_id' => 50,
                'tune_id' => 16,
            ],
            [
                'virtual_live_id' => 50,
                'tune_id' =>  77,
            ],
            [
                'virtual_live_id' => 51,
                'tune_id' => 88,
            ],
            [
                'virtual_live_id' => 52,
                'tune_id' => 28,
            ],
            [
                'virtual_live_id' => 52,
                'tune_id' =>  27,
            ],
            [
                'virtual_live_id' => 53,
                'tune_id' => 88,
            ],
            [
                'virtual_live_id' => 54,
                'tune_id' => 91,
            ],
            [
                'virtual_live_id' => 55,
                'tune_id' => 22,
            ],
            [
                'virtual_live_id' => 56,
                'tune_id' => 81,
            ],
            [
                'virtual_live_id' => 57,
                'tune_id' => 96,
            ],
            [
                'virtual_live_id' => 58,
                'tune_id' => 46,
            ],
            [
                'virtual_live_id' => 59,
                'tune_id' => 89,
            ],
            [
                'virtual_live_id' => 60,
                'tune_id' => 74,
            ],
            [
                'virtual_live_id' => 60,
                'tune_id' =>  19,
            ],
            [
                'virtual_live_id' => 61,
                'tune_id' => 24,
            ],
            [
                'virtual_live_id' => 62,
                'tune_id' => 10,
            ],
            [
                'virtual_live_id' => 63,
                'tune_id' => 68,
            ],
            [
                'virtual_live_id' => 63,
                'tune_id' =>  15,
            ],
            [
                'virtual_live_id' => 64,
                'tune_id' => 102,
            ],
            [
                'virtual_live_id' => 65,
                'tune_id' => 51,
            ],
            [
                'virtual_live_id' => 66,
                'tune_id' => 26,
            ],
            [
                'virtual_live_id' => 67,
                'tune_id' => 100,
            ],
            [
                'virtual_live_id' => 67,
                'tune_id' =>  10,
            ],
            [
                'virtual_live_id' => 68,
                'tune_id' => 105,
            ],
            [
                'virtual_live_id' => 69,
                'tune_id' => 24,
            ],
            [
                'virtual_live_id' => 70,
                'tune_id' => 17,
            ],
            [
                'virtual_live_id' => 71,
                'tune_id' => 78,
            ],
            [
                'virtual_live_id' => 72,
                'tune_id' => 109,
            ],
            [
                'virtual_live_id' => 72,
                'tune_id' =>  15,
            ],
            [
                'virtual_live_id' => 73,
                'tune_id' => 35,
            ],
            [
                'virtual_live_id' => 73,
                'tune_id' =>  57,
            ],
            [
                'virtual_live_id' => 74,
                'tune_id' => 22,
            ],
            [
                'virtual_live_id' => 75,
                'tune_id' => 112,
            ],
            [
                'virtual_live_id' => 76,
                'tune_id' => 91,
            ],
            [
                'virtual_live_id' => 77,
                'tune_id' => 68,
            ],
            [
                'virtual_live_id' => 78,
                'tune_id' => 1,
            ],
            [
                'virtual_live_id' => 79,
                'tune_id' => 7,
            ],
            [
                'virtual_live_id' => 79,
                'tune_id' =>  74,
            ],
        ];

        DB::table('virtual_live_tunes')->truncate();
        foreach ($records as $record) {
            $entity = new VirtualLiveTune();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
