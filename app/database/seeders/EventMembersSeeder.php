<?php

namespace Database\Seeders;

use App\Models\EventMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventMembersSeeder extends Seeder
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
                'event_id' => 1,
                'member_id' => 10,
            ],
            [
                'event_id' => 1,
                'member_id' =>  13,
            ],
            [
                'event_id' => 1,
                'member_id' =>  14,
            ],
            [
                'event_id' => 1,
                'member_id' =>  15,
            ],
            [
                'event_id' => 1,
                'member_id' =>  16,
            ],
            [
                'event_id' => 2,
                'member_id' => 47,
            ],
            [
                'event_id' => 2,
                'member_id' =>  53,
            ],
            [
                'event_id' => 2,
                'member_id' =>  54,
            ],
            [
                'event_id' => 2,
                'member_id' =>  55,
            ],
            [
                'event_id' => 2,
                'member_id' =>  56,
            ],
            [
                'event_id' => 3,
                'member_id' => 42,
            ],
            [
                'event_id' => 3,
                'member_id' =>  43,
            ],
            [
                'event_id' => 3,
                'member_id' =>  44,
            ],
            [
                'event_id' => 3,
                'member_id' =>  45,
            ],
            [
                'event_id' => 3,
                'member_id' =>  46,
            ],
            [
                'event_id' => 4,
                'member_id' => 14,
            ],
            [
                'event_id' => 4,
                'member_id' =>  24,
            ],
            [
                'event_id' => 4,
                'member_id' =>  37,
            ],
            [
                'event_id' => 4,
                'member_id' =>  44,
            ],
            [
                'event_id' => 4,
                'member_id' =>  54,
            ],
            [
                'event_id' => 5,
                'member_id' => 18,
            ],
            [
                'event_id' => 5,
                'member_id' =>  23,
            ],
            [
                'event_id' => 5,
                'member_id' =>  24,
            ],
            [
                'event_id' => 5,
                'member_id' =>  25,
            ],
            [
                'event_id' => 5,
                'member_id' =>  26,
            ],
            [
                'event_id' => 6,
                'member_id' => 31,
            ],
            [
                'event_id' => 6,
                'member_id' =>  33,
            ],
            [
                'event_id' => 6,
                'member_id' =>  34,
            ],
            [
                'event_id' => 6,
                'member_id' =>  35,
            ],
            [
                'event_id' => 6,
                'member_id' =>  36,
            ],
            [
                'event_id' => 7,
                'member_id' => 36,
            ],
            [
                'event_id' => 7,
                'member_id' =>  42,
            ],
            [
                'event_id' => 7,
                'member_id' =>  43,
            ],
            [
                'event_id' => 7,
                'member_id' =>  45,
            ],
            [
                'event_id' => 7,
                'member_id' =>  56,
            ],
            [
                'event_id' => 8,
                'member_id' => 37,
            ],
            [
                'event_id' => 8,
                'member_id' =>  41,
            ],
            [
                'event_id' => 8,
                'member_id' =>  44,
            ],
            [
                'event_id' => 8,
                'member_id' =>  45,
            ],
            [
                'event_id' => 8,
                'member_id' =>  46,
            ],
            [
                'event_id' => 9,
                'member_id' => 10,
            ],
            [
                'event_id' => 9,
                'member_id' =>  14,
            ],
            [
                'event_id' => 9,
                'member_id' =>  27,
            ],
            [
                'event_id' => 9,
                'member_id' =>  29,
            ],
            [
                'event_id' => 9,
                'member_id' =>  43,
            ],
            [
                'event_id' => 9,
                'member_id' =>  55,
            ],
            [
                'event_id' => 10,
                'member_id' => 11,
            ],
            [
                'event_id' => 10,
                'member_id' =>  13,
            ],
            [
                'event_id' => 10,
                'member_id' =>  14,
            ],
            [
                'event_id' => 10,
                'member_id' =>  15,
            ],
            [
                'event_id' => 10,
                'member_id' =>  16,
            ],
            [
                'event_id' => 11,
                'member_id' => 20,
            ],
            [
                'event_id' => 11,
                'member_id' =>  23,
            ],
            [
                'event_id' => 11,
                'member_id' =>  24,
            ],
            [
                'event_id' => 11,
                'member_id' =>  25,
            ],
            [
                'event_id' => 11,
                'member_id' =>  26,
            ],
            [
                'event_id' => 12,
                'member_id' => 29,
            ],
            [
                'event_id' => 12,
                'member_id' =>  33,
            ],
            [
                'event_id' => 12,
                'member_id' =>  34,
            ],
            [
                'event_id' => 12,
                'member_id' =>  35,
            ],
            [
                'event_id' => 12,
                'member_id' =>  36,
            ],
            [
                'event_id' => 13,
                'member_id' => 15,
            ],
            [
                'event_id' => 13,
                'member_id' =>  16,
            ],
            [
                'event_id' => 13,
                'member_id' =>  38,
            ],
            [
                'event_id' => 13,
                'member_id' =>  43,
            ],
            [
                'event_id' => 13,
                'member_id' =>  46,
            ],
            [
                'event_id' => 14,
                'member_id' => 48,
            ],
            [
                'event_id' => 14,
                'member_id' =>  53,
            ],
            [
                'event_id' => 14,
                'member_id' =>  54,
            ],
            [
                'event_id' => 14,
                'member_id' =>  55,
            ],
            [
                'event_id' => 14,
                'member_id' =>  56,
            ],
            [
                'event_id' => 15,
                'member_id' => 39,
            ],
            [
                'event_id' => 15,
                'member_id' =>  43,
            ],
            [
                'event_id' => 15,
                'member_id' =>  44,
            ],
            [
                'event_id' => 15,
                'member_id' =>  45,
            ],
            [
                'event_id' => 15,
                'member_id' =>  46,
            ],
            [
                'event_id' => 16,
                'member_id' => 14,
            ],
            [
                'event_id' => 16,
                'member_id' =>  15,
            ],
            [
                'event_id' => 16,
                'member_id' =>  36,
            ],
            [
                'event_id' => 16,
                'member_id' =>  40,
            ],
            [
                'event_id' => 16,
                'member_id' =>  43,
            ],
            [
                'event_id' => 17,
                'member_id' => 20,
            ],
            [
                'event_id' => 17,
                'member_id' =>  23,
            ],
            [
                'event_id' => 17,
                'member_id' =>  24,
            ],
            [
                'event_id' => 17,
                'member_id' =>  25,
            ],
            [
                'event_id' => 17,
                'member_id' =>  26,
            ],
            [
                'event_id' => 18,
                'member_id' => 7,
            ],
            [
                'event_id' => 18,
                'member_id' =>  13,
            ],
            [
                'event_id' => 18,
                'member_id' =>  23,
            ],
            [
                'event_id' => 18,
                'member_id' =>  33,
            ],
            [
                'event_id' => 18,
                'member_id' =>  53,
            ],
            [
                'event_id' => 19,
                'member_id' => 51,
            ],
            [
                'event_id' => 19,
                'member_id' =>  53,
            ],
            [
                'event_id' => 19,
                'member_id' =>  54,
            ],
            [
                'event_id' => 19,
                'member_id' =>  55,
            ],
            [
                'event_id' => 19,
                'member_id' =>  56,
            ],
            [
                'event_id' => 20,
                'member_id' => 11,
            ],
            [
                'event_id' => 20,
                'member_id' =>  13,
            ],
            [
                'event_id' => 20,
                'member_id' =>  14,
            ],
            [
                'event_id' => 20,
                'member_id' =>  15,
            ],
            [
                'event_id' => 20,
                'member_id' =>  16,
            ],
            [
                'event_id' => 21,
                'member_id' => 32,
            ],
            [
                'event_id' => 21,
                'member_id' =>  33,
            ],
            [
                'event_id' => 21,
                'member_id' =>  34,
            ],
            [
                'event_id' => 21,
                'member_id' =>  35,
            ],
            [
                'event_id' => 21,
                'member_id' =>  36,
            ],
            [
                'event_id' => 22,
                'member_id' => 20,
            ],
            [
                'event_id' => 22,
                'member_id' =>  25,
            ],
            [
                'event_id' => 22,
                'member_id' =>  46,
            ],
            [
                'event_id' => 22,
                'member_id' =>  55,
            ],
            [
                'event_id' => 22,
                'member_id' =>  56,
            ],
            [
                'event_id' => 23,
                'member_id' => 21,
            ],
            [
                'event_id' => 23,
                'member_id' =>  23,
            ],
            [
                'event_id' => 23,
                'member_id' =>  24,
            ],
            [
                'event_id' => 23,
                'member_id' =>  25,
            ],
            [
                'event_id' => 23,
                'member_id' =>  26,
            ],
            [
                'event_id' => 24,
                'member_id' => 34,
            ],
            [
                'event_id' => 24,
                'member_id' =>  35,
            ],
            [
                'event_id' => 24,
                'member_id' =>  36,
            ],
            [
                'event_id' => 24,
                'member_id' =>  39,
            ],
            [
                'event_id' => 24,
                'member_id' =>  46,
            ],
            [
                'event_id' => 25,
                'member_id' => 38,
            ],
            [
                'event_id' => 25,
                'member_id' =>  42,
            ],
            [
                'event_id' => 25,
                'member_id' =>  43,
            ],
            [
                'event_id' => 25,
                'member_id' =>  44,
            ],
            [
                'event_id' => 25,
                'member_id' =>  45,
            ],
            [
                'event_id' => 26,
                'member_id' => 50,
            ],
            [
                'event_id' => 26,
                'member_id' =>  53,
            ],
            [
                'event_id' => 26,
                'member_id' =>  54,
            ],
            [
                'event_id' => 26,
                'member_id' =>  55,
            ],
            [
                'event_id' => 26,
                'member_id' =>  56,
            ],
            [
                'event_id' => 27,
                'member_id' => 8,
            ],
            [
                'event_id' => 27,
                'member_id' =>  13,
            ],
            [
                'event_id' => 27,
                'member_id' =>  14,
            ],
            [
                'event_id' => 27,
                'member_id' =>  15,
            ],
            [
                'event_id' => 27,
                'member_id' =>  16,
            ],
            [
                'event_id' => 28,
                'member_id' => 28,
            ],
            [
                'event_id' => 28,
                'member_id' =>  31,
            ],
            [
                'event_id' => 28,
                'member_id' =>  33,
            ],
            [
                'event_id' => 28,
                'member_id' =>  34,
            ],
            [
                'event_id' => 28,
                'member_id' =>  36,
            ],
            [
                'event_id' => 29,
                'member_id' => 25,
            ],
            [
                'event_id' => 29,
                'member_id' =>  29,
            ],
            [
                'event_id' => 29,
                'member_id' =>  35,
            ],
            [
                'event_id' => 29,
                'member_id' =>  55,
            ],
            [
                'event_id' => 29,
                'member_id' =>  56,
            ],
            [
                'event_id' => 30,
                'member_id' => 14,
            ],
            [
                'event_id' => 30,
                'member_id' =>  15,
            ],
            [
                'event_id' => 30,
                'member_id' =>  33,
            ],
            [
                'event_id' => 30,
                'member_id' =>  37,
            ],
            [
                'event_id' => 30,
                'member_id' =>  44,
            ],
            [
                'event_id' => 31,
                'member_id' => 19,
            ],
            [
                'event_id' => 31,
                'member_id' =>  23,
            ],
            [
                'event_id' => 31,
                'member_id' =>  24,
            ],
            [
                'event_id' => 31,
                'member_id' =>  25,
            ],
            [
                'event_id' => 31,
                'member_id' =>  26,
            ],
            [
                'event_id' => 32,
                'member_id' => 40,
            ],
            [
                'event_id' => 32,
                'member_id' =>  42,
            ],
            [
                'event_id' => 32,
                'member_id' =>  44,
            ],
            [
                'event_id' => 32,
                'member_id' =>  45,
            ],
            [
                'event_id' => 32,
                'member_id' =>  46,
            ],
            [
                'event_id' => 33,
                'member_id' => 7,
            ],
            [
                'event_id' => 33,
                'member_id' =>  16,
            ],
            [
                'event_id' => 33,
                'member_id' =>  21,
            ],
            [
                'event_id' => 33,
                'member_id' =>  26,
            ],
            [
                'event_id' => 33,
                'member_id' =>  54,
            ],
            [
                'event_id' => 34,
                'member_id' => 12,
            ],
            [
                'event_id' => 34,
                'member_id' =>  13,
            ],
            [
                'event_id' => 34,
                'member_id' =>  14,
            ],
            [
                'event_id' => 34,
                'member_id' =>  15,
            ],
            [
                'event_id' => 34,
                'member_id' =>  16,
            ],
            [
                'event_id' => 35,
                'member_id' => 48,
            ],
            [
                'event_id' => 35,
                'member_id' =>  53,
            ],
            [
                'event_id' => 35,
                'member_id' =>  54,
            ],
            [
                'event_id' => 35,
                'member_id' =>  55,
            ],
            [
                'event_id' => 35,
                'member_id' =>  56,
            ],
            [
                'event_id' => 36,
                'member_id' => 23,
            ],
            [
                'event_id' => 36,
                'member_id' =>  33,
            ],
            [
                'event_id' => 36,
                'member_id' =>  43,
            ],
            [
                'event_id' => 36,
                'member_id' =>  53,
            ],
            [
                'event_id' => 37,
                'member_id' => 27,
            ],
            [
                'event_id' => 37,
                'member_id' =>  28,
            ],
            [
                'event_id' => 37,
                'member_id' =>  29,
            ],
            [
                'event_id' => 37,
                'member_id' =>  31,
            ],
            [
                'event_id' => 37,
                'member_id' =>  32,
            ],
            [
                'event_id' => 37,
                'member_id' =>  33,
            ],
            [
                'event_id' => 37,
                'member_id' =>  34,
            ],
            [
                'event_id' => 37,
                'member_id' =>  35,
            ],
            [
                'event_id' => 37,
                'member_id' =>  36,
            ],
            [
                'event_id' => 38,
                'member_id' => 37,
            ],
            [
                'event_id' => 38,
                'member_id' =>  38,
            ],
            [
                'event_id' => 38,
                'member_id' =>  39,
            ],
            [
                'event_id' => 38,
                'member_id' =>  40,
            ],
            [
                'event_id' => 38,
                'member_id' =>  41,
            ],
            [
                'event_id' => 38,
                'member_id' =>  42,
            ],
            [
                'event_id' => 38,
                'member_id' =>  43,
            ],
            [
                'event_id' => 38,
                'member_id' =>  44,
            ],
            [
                'event_id' => 38,
                'member_id' =>  45,
            ],
            [
                'event_id' => 38,
                'member_id' =>  46,
            ],
            [
                'event_id' => 39,
                'member_id' => 47,
            ],
            [
                'event_id' => 39,
                'member_id' =>  48,
            ],
            [
                'event_id' => 39,
                'member_id' =>  50,
            ],
            [
                'event_id' => 39,
                'member_id' =>  51,
            ],
            [
                'event_id' => 39,
                'member_id' =>  53,
            ],
            [
                'event_id' => 39,
                'member_id' =>  54,
            ],
            [
                'event_id' => 39,
                'member_id' =>  55,
            ],
            [
                'event_id' => 39,
                'member_id' =>  56,
            ],
            [
                'event_id' => 40,
                'member_id' => 7,
            ],
            [
                'event_id' => 40,
                'member_id' =>  8,
            ],
            [
                'event_id' => 40,
                'member_id' =>  9,
            ],
            [
                'event_id' => 40,
                'member_id' =>  10,
            ],
            [
                'event_id' => 40,
                'member_id' =>  11,
            ],
            [
                'event_id' => 40,
                'member_id' =>  12,
            ],
            [
                'event_id' => 40,
                'member_id' =>  13,
            ],
            [
                'event_id' => 40,
                'member_id' =>  14,
            ],
            [
                'event_id' => 40,
                'member_id' =>  15,
            ],
            [
                'event_id' => 40,
                'member_id' =>  16,
            ],
            [
                'event_id' => 41,
                'member_id' => 20,
            ],
            [
                'event_id' => 41,
                'member_id' =>  24,
            ],
            [
                'event_id' => 41,
                'member_id' =>  26,
            ],
            [
                'event_id' => 41,
                'member_id' =>  33,
            ],
            [
                'event_id' => 41,
                'member_id' =>  34,
            ],
            [
                'event_id' => 42,
                'member_id' => 13,
            ],
            [
                'event_id' => 42,
                'member_id' =>  15,
            ],
            [
                'event_id' => 42,
                'member_id' =>  47,
            ],
            [
                'event_id' => 42,
                'member_id' =>  53,
            ],
            [
                'event_id' => 42,
                'member_id' =>  54,
            ],
            [
                'event_id' => 43,
                'member_id' => 17,
            ],
            [
                'event_id' => 43,
                'member_id' =>  18,
            ],
            [
                'event_id' => 43,
                'member_id' =>  19,
            ],
            [
                'event_id' => 43,
                'member_id' =>  20,
            ],
            [
                'event_id' => 43,
                'member_id' =>  21,
            ],
            [
                'event_id' => 43,
                'member_id' =>  22,
            ],
            [
                'event_id' => 43,
                'member_id' =>  23,
            ],
            [
                'event_id' => 43,
                'member_id' =>  24,
            ],
            [
                'event_id' => 43,
                'member_id' =>  25,
            ],
            [
                'event_id' => 43,
                'member_id' =>  26,
            ],
            [
                'event_id' => 44,
                'member_id' => 27,
            ],
            [
                'event_id' => 44,
                'member_id' =>  28,
            ],
            [
                'event_id' => 44,
                'member_id' =>  29,
            ],
            [
                'event_id' => 44,
                'member_id' =>  30,
            ],
            [
                'event_id' => 44,
                'member_id' =>  31,
            ],
            [
                'event_id' => 44,
                'member_id' =>  32,
            ],
            [
                'event_id' => 44,
                'member_id' =>  33,
            ],
            [
                'event_id' => 44,
                'member_id' =>  34,
            ],
            [
                'event_id' => 44,
                'member_id' =>  35,
            ],
            [
                'event_id' => 44,
                'member_id' =>  36,
            ],
            [
                'event_id' => 45,
                'member_id' => 15,
            ],
            [
                'event_id' => 45,
                'member_id' =>  16,
            ],
            [
                'event_id' => 45,
                'member_id' =>  17,
            ],
            [
                'event_id' => 45,
                'member_id' =>  24,
            ],
            [
                'event_id' => 45,
                'member_id' =>  33,
            ],
            [
                'event_id' => 46,
                'member_id' => 37,
            ],
            [
                'event_id' => 46,
                'member_id' =>  38,
            ],
            [
                'event_id' => 46,
                'member_id' =>  39 ,
            ],
            [
                'event_id' => 46,
                'member_id' => 40,
            ],
            [
                'event_id' => 46,
                'member_id' =>  41,
            ],
            [
                'event_id' => 46,
                'member_id' =>  43,
            ],
            [
                'event_id' => 46,
                'member_id' =>  44,
            ],
            [
                'event_id' => 46,
                'member_id' =>  45,
            ],
            [
                'event_id' => 46,
                'member_id' =>  46,
            ],
            [
                'event_id' => 47,
                'member_id' => 47,
            ],
            [
                'event_id' => 47,
                'member_id' =>  48,
            ],
            [
                'event_id' => 47,
                'member_id' =>  50,
            ],
            [
                'event_id' => 47,
                'member_id' =>  51,
            ],
            [
                'event_id' => 47,
                'member_id' =>  53,
            ],
            [
                'event_id' => 47,
                'member_id' =>  54,
            ],
            [
                'event_id' => 47,
                'member_id' =>  55,
            ],
            [
                'event_id' => 47,
                'member_id' =>  56,
            ],
            [
                'event_id' => 48,
                'member_id' => 14,
            ],
            [
                'event_id' => 48,
                'member_id' =>  18,
            ],
            [
                'event_id' => 48,
                'member_id' =>  25,
            ],
            [
                'event_id' => 48,
                'member_id' =>  26,
            ],
            [
                'event_id' => 48,
                'member_id' =>  44,
            ],
            [
                'event_id' => 49,
                'member_id' => 27,
            ],
            [
                'event_id' => 49,
                'member_id' =>  28,
            ],
            [
                'event_id' => 49,
                'member_id' =>  29,
            ],
            [
                'event_id' => 49,
                'member_id' =>  30,
            ],
            [
                'event_id' => 49,
                'member_id' =>  31,
            ],
            [
                'event_id' => 49,
                'member_id' =>  32,
            ],
            [
                'event_id' => 49,
                'member_id' =>  33,
            ],
            [
                'event_id' => 49,
                'member_id' =>  34,
            ],
            [
                'event_id' => 49,
                'member_id' =>  35,
            ],
            [
                'event_id' => 49,
                'member_id' =>  36,
            ],
            [
                'event_id' => 50,
                'member_id' => 7,
            ],
            [
                'event_id' => 50,
                'member_id' =>  8,
            ],
            [
                'event_id' => 50,
                'member_id' =>  9,
            ],
            [
                'event_id' => 50,
                'member_id' =>  10,
            ],
            [
                'event_id' => 50,
                'member_id' => 11,
            ],
            [
                'event_id' => 50,
                'member_id' =>  12,
            ],
            [
                'event_id' => 50,
                'member_id' =>  13,
            ],
            [
                'event_id' => 50,
                'member_id' =>  14,
            ],
            [
                'event_id' => 50,
                'member_id' =>  15,
            ],
            [
                'event_id' => 50,
                'member_id' =>  16,
            ],
            [
                'event_id' => 51,
                'member_id' => 16,
            ],
            [
                'event_id' => 51,
                'member_id' =>  35,
            ],
            [
                'event_id' => 51,
                'member_id' =>  39,
            ],
            [
                'event_id' => 51,
                'member_id' =>  43,
            ],
            [
                'event_id' => 51,
                'member_id' =>  56,
            ],
            [
                'event_id' => 52,
                'member_id' => 17,
            ],
            [
                'event_id' => 52,
                'member_id' =>  18,
            ],
            [
                'event_id' => 52,
                'member_id' => 19,
            ],
            [
                'event_id' => 52,
                'member_id' =>  20,
            ],
            [
                'event_id' => 52,
                'member_id' =>  21,
            ],
            [
                'event_id' => 52,
                'member_id' =>  22,
            ],
            [
                'event_id' => 52,
                'member_id' =>  23,
            ],
            [
                'event_id' => 52,
                'member_id' =>  24,
            ],
            [
                'event_id' => 52,
                'member_id' =>  25,
            ],
            [
                'event_id' => 52,
                'member_id' =>  26,
            ],
            [
                'event_id' => 53,
                'member_id' => 47,
            ],
            [
                'event_id' => 53,
                'member_id' =>  48,
            ],
            [
                'event_id' => 53,
                'member_id' =>  50,
            ],
            [
                'event_id' => 53,
                'member_id' =>  51,
            ],
            [
                'event_id' => 53,
                'member_id' =>  53,
            ],
            [
                'event_id' => 53,
                'member_id' =>  54,
            ],
            [
                'event_id' => 53,
                'member_id' =>  55,
            ],
            [
                'event_id' => 53,
                'member_id' =>  56,
            ],
            [
                'event_id' => 54,
                'member_id' => 10,
            ],
            [
                'event_id' => 54,
                'member_id' =>  18,
            ],
            [
                'event_id' => 54,
                'member_id' =>  29,
            ],
            [
                'event_id' => 54,
                'member_id' =>  31,
            ],
            [
                'event_id' => 54,
                'member_id' =>  42,
            ],
            [
                'event_id' => 54,
                'member_id' =>  47,
            ],
            [
                'event_id' => 55,
                'member_id' => 37,
            ],
            [
                'event_id' => 55,
                'member_id' =>  38,
            ],
            [
                'event_id' => 55,
                'member_id' =>  39,
            ],
            [
                'event_id' => 55,
                'member_id' =>  40,
            ],
            [
                'event_id' => 55,
                'member_id' =>  41,
            ],
            [
                'event_id' => 55,
                'member_id' =>  42,
            ],
            [
                'event_id' => 55,
                'member_id' =>  43,
            ],
            [
                'event_id' => 55,
                'member_id' =>  44,
            ],
            [
                'event_id' => 55,
                'member_id' =>  45,
            ],
            [
                'event_id' => 55,
                'member_id' =>  46,
            ],
            [
                'event_id' => 56,
                'member_id' => 7,
            ],
            [
                'event_id' => 56,
                'member_id' =>  8,
            ],
            [
                'event_id' => 56,
                'member_id' =>  9,
            ],
            [
                'event_id' => 56,
                'member_id' =>  10,
            ],
            [
                'event_id' => 56,
                'member_id' =>  11,
            ],
            [
                'event_id' => 56,
                'member_id' =>  12,
            ],
            [
                'event_id' => 56,
                'member_id' =>  13,
            ],
            [
                'event_id' => 56,
                'member_id' =>  14,
            ],
            [
                'event_id' => 56,
                'member_id' =>  15,
            ],
            [
                'event_id' => 56,
                'member_id' =>  16,
            ],
            [
                'event_id' => 57,
                'member_id' => 17,
            ],
            [
                'event_id' => 57,
                'member_id' =>  18,
            ],
            [
                'event_id' => 57,
                'member_id' =>  19,
            ],
            [
                'event_id' => 57,
                'member_id' =>  20,
            ],
            [
                'event_id' => 57,
                'member_id' =>  21,
            ],
            [
                'event_id' => 57,
                'member_id' =>  22,
            ],
            [
                'event_id' => 57,
                'member_id' =>  23,
            ],
            [
                'event_id' => 57,
                'member_id' =>  24,
            ],
            [
                'event_id' => 57,
                'member_id' =>  26,
            ],
            [
                'event_id' => 58,
                'member_id' => 35,
            ],
            [
                'event_id' => 58,
                'member_id' =>  40,
            ],
            [
                'event_id' => 58,
                'member_id' =>  46,
            ],
            [
                'event_id' => 58,
                'member_id' =>  55,
            ],
            [
                'event_id' => 58,
                'member_id' =>  56,
            ],
            [
                'event_id' => 59,
                'member_id' => 27,
            ],
            [
                'event_id' => 59,
                'member_id' =>  28,
            ],
            [
                'event_id' => 59,
                'member_id' =>  29,
            ],
            [
                'event_id' => 59,
                'member_id' =>  30,
            ],
            [
                'event_id' => 59,
                'member_id' =>  31,
            ],
            [
                'event_id' => 59,
                'member_id' =>  32,
            ],
            [
                'event_id' => 59,
                'member_id' =>  33,
            ],
            [
                'event_id' => 59,
                'member_id' =>  34,
            ],
            [
                'event_id' => 59,
                'member_id' =>  35,
            ],
            [
                'event_id' => 59,
                'member_id' =>  36,
            ],
            [
                'event_id' => 60,
                'member_id' => 25,
            ],
            [
                'event_id' => 60,
                'member_id' =>  26,
            ],
            [
                'event_id' => 60,
                'member_id' =>  31,
            ],
            [
                'event_id' => 60,
                'member_id' =>  33,
            ],
            [
                'event_id' => 60,
                'member_id' =>  34,
            ],
            [
                'event_id' => 61,
                'member_id' => 47,
            ],
            [
                'event_id' => 61,
                'member_id' =>  48,
            ],
            [
                'event_id' => 61,
                'member_id' =>  49,
            ],
            [
                'event_id' => 61,
                'member_id' =>  50,
            ],
            [
                'event_id' => 61,
                'member_id' =>  51,
            ],
            [
                'event_id' => 61,
                'member_id' =>  53,
            ],
            [
                'event_id' => 61,
                'member_id' =>  54,
            ],
            [
                'event_id' => 61,
                'member_id' =>  55,
            ],
            [
                'event_id' => 61,
                'member_id' =>  56,
            ],
            [
                'event_id' => 62,
                'member_id' => 37,
            ],
            [
                'event_id' => 62,
                'member_id' =>  38,
            ],
            [
                'event_id' => 62,
                'member_id' =>  39,
            ],
            [
                'event_id' => 62,
                'member_id' =>  40,
            ],
            [
                'event_id' => 62,
                'member_id' =>  41,
            ],
            [
                'event_id' => 62,
                'member_id' =>  42,
            ],
            [
                'event_id' => 62,
                'member_id' =>  43,
            ],
            [
                'event_id' => 62,
                'member_id' =>  44,
            ],
            [
                'event_id' => 62,
                'member_id' =>  45,
            ],
            [
                'event_id' => 62,
                'member_id' =>  46,
            ],
            [
                'event_id' => 63,
                'member_id' => 13,
            ],
            [
                'event_id' => 63,
                'member_id' =>  23,
            ],
            [
                'event_id' => 63,
                'member_id' =>  50,
            ],
            [
                'event_id' => 63,
                'member_id' =>  53,
            ],
            [
                'event_id' => 63,
                'member_id' =>  55,
            ],
            [
                'event_id' => 64,
                'member_id' => 27,
            ],
            [
                'event_id' => 64,
                'member_id' =>  28,
            ],
            [
                'event_id' => 64,
                'member_id' =>  29,
            ],
            [
                'event_id' => 64,
                'member_id' =>  30,
            ],
            [
                'event_id' => 64,
                'member_id' =>  31,
            ],
            [
                'event_id' => 64,
                'member_id' =>  32,
            ],
            [
                'event_id' => 64,
                'member_id' =>  33,
            ],
            [
                'event_id' => 64,
                'member_id' =>  34,
            ],
            [
                'event_id' => 64,
                'member_id' =>  35,
            ],
            [
                'event_id' => 64,
                'member_id' =>  36,
            ],
            [
                'event_id' => 65,
                'member_id' => 7,
            ],
            [
                'event_id' => 65,
                'member_id' =>  8,
            ],
            [
                'event_id' => 65,
                'member_id' =>  9,
            ],
            [
                'event_id' => 65,
                'member_id' =>  10,
            ],
            [
                'event_id' => 65,
                'member_id' =>  11,
            ],
            [
                'event_id' => 65,
                'member_id' =>  12,
            ],
            [
                'event_id' => 65,
                'member_id' =>  13,
            ],
            [
                'event_id' => 65,
                'member_id' =>  14,
            ],
            [
                'event_id' => 65,
                'member_id' =>  15,
            ],
            [
                'event_id' => 65,
                'member_id' =>  16,
            ],
            [
                'event_id' => 66,
                'member_id' => 35,
            ],
            [
                'event_id' => 66,
                'member_id' =>  36,
            ],
            [
                'event_id' => 66,
                'member_id' =>  37,
            ],
            [
                'event_id' => 66,
                'member_id' =>  44,
            ],
            [
                'event_id' => 66,
                'member_id' =>  45,
            ],


        ];

        DB::table('event_members')->truncate();
        foreach ($records as $record) {
            $entity = new EventMember();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
