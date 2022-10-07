<?php

namespace Database\Seeders;

use App\Models\VirtualLiveMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VirtualLiveMembersSeeder extends Seeder
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
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 1,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 1,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 1,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 1,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 1,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 2,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 2,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 2,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 2,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 2,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 2,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 3,
                'member_id' => 17,
            ],
            [
                'virtual_live_id' => 3,
                'member_id' =>  18,
            ],
            [
                'virtual_live_id' => 3,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 3,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 3,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 3,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 4,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 4,
                'member_id' =>  28,
            ],
            [
                'virtual_live_id' => 4,
                'member_id' =>  29,
            ],
            [
                'virtual_live_id' => 4,
                'member_id' =>  31,
            ],
            [
                'virtual_live_id' => 4,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 4,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 4,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 4,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 5,
                'member_id' => 37,
            ],
            [
                'virtual_live_id' => 5,
                'member_id' =>  38,
            ],
            [
                'virtual_live_id' => 5,
                'member_id' =>  42,
            ],
            [
                'virtual_live_id' => 5,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 5,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 5,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 5,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 6,
                'member_id' => 17,
            ],
            [
                'virtual_live_id' => 6,
                'member_id' =>  18,
            ],
            [
                'virtual_live_id' => 6,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 6,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 6,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 6,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 7,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 7,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 7,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 7,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 7,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 8,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 8,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 8,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 8,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 8,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 8,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 9,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 9,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 9,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 9,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 9,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 9,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 10,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 10,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 10,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 10,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 10,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 10,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 11,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 11,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 11,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 11,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 11,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  17,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 12,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 13,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 13,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 13,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 13,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 13,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 13,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 14,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 14,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 14,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 14,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 14,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 14,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 15,
                'member_id' => 17,
            ],
            [
                'virtual_live_id' => 15,
                'member_id' =>  18,
            ],
            [
                'virtual_live_id' => 15,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 15,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 15,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 15,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 16,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 16,
                'member_id' =>  28,
            ],
            [
                'virtual_live_id' => 16,
                'member_id' =>  29,
            ],
            [
                'virtual_live_id' => 16,
                'member_id' =>  31,
            ],
            [
                'virtual_live_id' => 16,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 16,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 16,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 16,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 17,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 17,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 17,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 17,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 17,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 17,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 18,
                'member_id' => 37,
            ],
            [
                'virtual_live_id' => 18,
                'member_id' =>  38,
            ],
            [
                'virtual_live_id' => 18,
                'member_id' =>  42,
            ],
            [
                'virtual_live_id' => 18,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 18,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 18,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 18,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 19,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 19,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 19,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 19,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 19,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 20,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 20,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 20,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 20,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 20,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 20,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 21,
                'member_id' => 42,
            ],
            [
                'virtual_live_id' => 21,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 21,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 21,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 21,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 22,
                'member_id' => 28,
            ],
            [
                'virtual_live_id' => 22,
                'member_id' =>  29,
            ],
            [
                'virtual_live_id' => 22,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 22,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 22,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 22,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 23,
                'member_id' => 18,
            ],
            [
                'virtual_live_id' => 23,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 23,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 23,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 23,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 24,
                'member_id' => 17,
            ],
            [
                'virtual_live_id' => 24,
                'member_id' =>  18,
            ],
            [
                'virtual_live_id' => 24,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 24,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 24,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 24,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 25,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 25,
                'member_id' =>  31,
            ],
            [
                'virtual_live_id' => 25,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 25,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 25,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 25,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  47,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 26,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 27,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 27,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 27,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 27,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 27,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 27,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 28,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 28,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 28,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 28,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 28,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 28,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 29,
                'member_id' => 37,
            ],
            [
                'virtual_live_id' => 29,
                'member_id' =>  41,
            ],
            [
                'virtual_live_id' => 29,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 29,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 29,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 29,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 30,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 30,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 30,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 30,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 30,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 30,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 31,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 31,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 31,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 31,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 31,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 31,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 32,
                'member_id' => 17,
            ],
            [
                'virtual_live_id' => 32,
                'member_id' =>  18,
            ],
            [
                'virtual_live_id' => 32,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 32,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 32,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 32,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 33,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 33,
                'member_id' =>  28,
            ],
            [
                'virtual_live_id' => 33,
                'member_id' =>  29,
            ],
            [
                'virtual_live_id' => 33,
                'member_id' =>  31,
            ],
            [
                'virtual_live_id' => 33,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 33,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 33,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 33,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' => 37,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' =>  38,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' =>  39,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' =>  41,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' =>  42,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 34,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 35,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 35,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 35,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 35,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 35,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 36,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 36,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 36,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 36,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 36,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 36,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 37,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 37,
                'member_id' =>  11,
            ],
            [
                'virtual_live_id' => 37,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 37,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 37,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 37,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 38,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 38,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 38,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 38,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 38,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 39,
                'member_id' => 17,
            ],
            [
                'virtual_live_id' => 39,
                'member_id' =>  20,
            ],
            [
                'virtual_live_id' => 39,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 39,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 39,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 39,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 40,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 40,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 40,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 40,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 40,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 40,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 41,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 41,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 41,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 41,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 41,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 42,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 42,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 42,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 42,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 42,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  37,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  41,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  42,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 43,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 44,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 44,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 44,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 44,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 44,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 44,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 45,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 45,
                'member_id' =>  48,
            ],
            [
                'virtual_live_id' => 45,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 45,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 45,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 45,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 46,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 46,
                'member_id' =>  31,
            ],
            [
                'virtual_live_id' => 46,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 46,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 46,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 46,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 47,
                'member_id' => 37,
            ],
            [
                'virtual_live_id' => 47,
                'member_id' =>  39,
            ],
            [
                'virtual_live_id' => 47,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 47,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 47,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 47,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  7,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 48,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 49,
                'member_id' => 17,
            ],
            [
                'virtual_live_id' => 49,
                'member_id' =>  18,
            ],
            [
                'virtual_live_id' => 49,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 49,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 49,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 49,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  39,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  40,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 50,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 51,
                'member_id' => 18,
            ],
            [
                'virtual_live_id' => 51,
                'member_id' =>  20,
            ],
            [
                'virtual_live_id' => 51,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 51,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 51,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 51,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 52,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 52,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 52,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 52,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 52,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 52,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 53,
                'member_id' => 17,
            ],
            [
                'virtual_live_id' => 53,
                'member_id' =>  18,
            ],
            [
                'virtual_live_id' => 53,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 53,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 53,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 53,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 54,
                'member_id' => 51,
            ],
            [
                'virtual_live_id' => 54,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 54,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 54,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 54,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 55,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 55,
                'member_id' =>  11,
            ],
            [
                'virtual_live_id' => 55,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 55,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 55,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 55,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 56,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 56,
                'member_id' =>  48,
            ],
            [
                'virtual_live_id' => 56,
                'member_id' =>  51,
            ],
            [
                'virtual_live_id' => 56,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 56,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 56,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 56,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 57,
                'member_id' => 32,
            ],
            [
                'virtual_live_id' => 57,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 57,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 57,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 57,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 58,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 58,
                'member_id' =>  11,
            ],
            [
                'virtual_live_id' => 58,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 58,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 58,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 58,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 59,
                'member_id' => 39,
            ],
            [
                'virtual_live_id' => 59,
                'member_id' =>  42,
            ],
            [
                'virtual_live_id' => 59,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 59,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 59,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 59,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 60,
                'member_id' => 20,
            ],
            [
                'virtual_live_id' => 60,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 60,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 60,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 60,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 60,
                'member_id' =>  47,
            ],
            [
                'virtual_live_id' => 60,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 60,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 61,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 61,
                'member_id' =>  32,
            ],
            [
                'virtual_live_id' => 61,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 61,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 61,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 61,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 62,
                'member_id' => 21,
            ],
            [
                'virtual_live_id' => 62,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 62,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 62,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 62,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' => 29,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  39,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 63,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' => 37,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  38,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  39,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  40,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  41,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  42,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 64,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 65,
                'member_id' => 37,
            ],
            [
                'virtual_live_id' => 65,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 65,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 65,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 65,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 66,
                'member_id' => 47,
            ],
            [
                'virtual_live_id' => 66,
                'member_id' =>  50,
            ],
            [
                'virtual_live_id' => 66,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 66,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 66,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 66,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  17,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  20,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 67,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 68,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 68,
                'member_id' =>  8,
            ],
            [
                'virtual_live_id' => 68,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 68,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 68,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 68,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 69,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 69,
                'member_id' =>  31,
            ],
            [
                'virtual_live_id' => 69,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 69,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 69,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 69,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 70,
                'member_id' => 38,
            ],
            [
                'virtual_live_id' => 70,
                'member_id' =>  42,
            ],
            [
                'virtual_live_id' => 70,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 70,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 70,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 70,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 71,
                'member_id' => 27,
            ],
            [
                'virtual_live_id' => 71,
                'member_id' =>  28,
            ],
            [
                'virtual_live_id' => 71,
                'member_id' =>  30,
            ],
            [
                'virtual_live_id' => 71,
                'member_id' =>  31,
            ],
            [
                'virtual_live_id' => 71,
                'member_id' =>  33,
            ],
            [
                'virtual_live_id' => 71,
                'member_id' =>  34,
            ],
            [
                'virtual_live_id' => 71,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 71,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 72,
                'member_id' => 29,
            ],
            [
                'virtual_live_id' => 72,
                'member_id' =>  35,
            ],
            [
                'virtual_live_id' => 72,
                'member_id' =>  36,
            ],
            [
                'virtual_live_id' => 72,
                'member_id' =>  47,
            ],
            [
                'virtual_live_id' => 72,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 72,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 72,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 72,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 73,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 73,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 73,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 73,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 73,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 73,
                'member_id' =>  37,
            ],
            [
                'virtual_live_id' => 73,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 73,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 74,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 74,
                'member_id' =>  8,
            ],
            [
                'virtual_live_id' => 74,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 74,
                'member_id' =>  11,
            ],
            [
                'virtual_live_id' => 74,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 74,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 74,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 74,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 75,
                'member_id' => 18,
            ],
            [
                'virtual_live_id' => 75,
                'member_id' =>  19,
            ],
            [
                'virtual_live_id' => 75,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 75,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 75,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 75,
                'member_id' =>  26,
            ],
            [
                'virtual_live_id' => 76,
                'member_id' => 51,
            ],
            [
                'virtual_live_id' => 76,
                'member_id' =>  53,
            ],
            [
                'virtual_live_id' => 76,
                'member_id' =>  54,
            ],
            [
                'virtual_live_id' => 76,
                'member_id' =>  55,
            ],
            [
                'virtual_live_id' => 76,
                'member_id' =>  56,
            ],
            [
                'virtual_live_id' => 77,
                'member_id' => 37,
            ],
            [
                'virtual_live_id' => 77,
                'member_id' =>  40,
            ],
            [
                'virtual_live_id' => 77,
                'member_id' =>  43,
            ],
            [
                'virtual_live_id' => 77,
                'member_id' =>  44,
            ],
            [
                'virtual_live_id' => 77,
                'member_id' =>  45,
            ],
            [
                'virtual_live_id' => 77,
                'member_id' =>  46,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' => 1,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  2,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  3,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  4,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  5,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  6,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  7,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  10,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 78,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' => 7,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  13,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  14,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  15,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  16,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  20,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  23,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  24,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  25,
            ],
            [
                'virtual_live_id' => 79,
                'member_id' =>  26,
            ],
        ];

        DB::table('virtual_live_members')->truncate();
        foreach ($records as $record) {
            $entity = new VirtualLiveMember();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
