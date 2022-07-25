<?php

namespace Database\Seeders;

use App\Models\Dancer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DancersSeeder extends Seeder
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
                'tune_id' => 1,
                'member_id' => 1,
            ],
            [
                'tune_id' => 7,
                'member_id' => 7,
            ],
            [
                'tune_id' => 7,
                'member_id' => 13,
            ],
            [
                'tune_id' => 7,
                'member_id' => 14,
            ],
            [
                'tune_id' => 7,
                'member_id' => 15,
            ],
            [
                'tune_id' => 7,
                'member_id' => 16,
            ],
            [
                'tune_id' => 8,
                'member_id' => 7,
            ],
            [
                'tune_id' => 8,
                'member_id' => 13,
            ],
            [
                'tune_id' => 8,
                'member_id' => 14,
            ],
            [
                'tune_id' => 8,
                'member_id' => 15,
            ],
            [
                'tune_id' => 8,
                'member_id' => 16,
            ],
            [
                'tune_id' => 10,
                'member_id' => 23,
            ],
            [
                'tune_id' => 10,
                'member_id' => 24,
            ],
            [
                'tune_id' => 10,
                'member_id' => 25,
            ],
            [
                'tune_id' => 10,
                'member_id' => 26,
            ],
            [
                'tune_id' => 12,
                'member_id' => 17,
            ],
            [
                'tune_id' => 12,
                'member_id' => 25,
            ],
            [
                'tune_id' => 12,
                'member_id' => 26,
            ],
            [
                'tune_id' => 13,
                'member_id' => 28,
            ],
            [
                'tune_id' => 13,
                'member_id' => 29,
            ],
            [
                'tune_id' => 13,
                'member_id' => 33,
            ],
            [
                'tune_id' => 13,
                'member_id' => 34,
            ],
            [
                'tune_id' => 15,
                'member_id' => 35,
            ],
            [
                'tune_id' => 15,
                'member_id' => 36,
            ],
            [
                'tune_id' => 16,
                'member_id' => 39,
            ],
            [
                'tune_id' => 16,
                'member_id' => 43,
            ],
            [
                'tune_id' => 16,
                'member_id' => 46,
            ],
            [
                'tune_id' => 17,
                'member_id' => 38,
            ],
            [
                'tune_id' => 17,
                'member_id' => 43,
            ],
            [
                'tune_id' => 17,
                'member_id' => 44,
            ],
            [
                'tune_id' => 17,
                'member_id' => 45,
            ],
            [
                'tune_id' => 17,
                'member_id' => 46,
            ],
            [
                'tune_id' => 19,
                'member_id' => 55,
            ],
            [
                'tune_id' => 19,
                'member_id' => 56,
            ],
            [
                'tune_id' => 21,
                'member_id' => 47,
            ],
            [
                'tune_id' => 21,
                'member_id' => 53,
            ],
            [
                'tune_id' => 21,
                'member_id' => 54,
            ],
            [
                'tune_id' => 22,
                'member_id' => 7,
            ],
            [
                'tune_id' => 22,
                'member_id' => 13,
            ],
            [
                'tune_id' => 22,
                'member_id' => 14,
            ],
            [
                'tune_id' => 22,
                'member_id' => 15,
            ],
            [
                'tune_id' => 22,
                'member_id' => 16,
            ],
            [
                'tune_id' => 23,
                'member_id' => 17,
            ],
            [
                'tune_id' => 23,
                'member_id' => 23,
            ],
            [
                'tune_id' => 23,
                'member_id' => 24,
            ],
            [
                'tune_id' => 23,
                'member_id' => 25,
            ],
            [
                'tune_id' => 23,
                'member_id' => 26,
            ],
            [
                'tune_id' => 24,
                'member_id' => 27,
            ],
            [
                'tune_id' => 24,
                'member_id' => 33,
            ],
            [
                'tune_id' => 24,
                'member_id' => 34,
            ],
            [
                'tune_id' => 24,
                'member_id' => 35,
            ],
            [
                'tune_id' => 24,
                'member_id' => 36,
            ],
            [
                'tune_id' => 25,
                'member_id' => 37,
            ],
            [
                'tune_id' => 25,
                'member_id' => 43,
            ],
            [
                'tune_id' => 25,
                'member_id' => 44,
            ],
            [
                'tune_id' => 25,
                'member_id' => 45,
            ],
            [
                'tune_id' => 25,
                'member_id' => 46,
            ],
            [
                'tune_id' => 26,
                'member_id' => 47,
            ],
            [
                'tune_id' => 26,
                'member_id' => 53,
            ],
            [
                'tune_id' => 26,
                'member_id' => 54,
            ],
            [
                'tune_id' => 26,
                'member_id' => 55,
            ],
            [
                'tune_id' => 26,
                'member_id' => 56,
            ],
            [
                'tune_id' => 27,
                'member_id' => 1,
            ],
            [
                'tune_id' => 27,
                'member_id' => 13,
            ],
            [
                'tune_id' => 27,
                'member_id' => 43,
            ],
            [
                'tune_id' => 27,
                'member_id' => 53,
            ],
            [
                'tune_id' => 28,
                'member_id' => 1,
            ],
            [
                'tune_id' => 28,
                'member_id' => 23,
            ],
            [
                'tune_id' => 28,
                'member_id' => 33,
            ],
            [
                'tune_id' => 30,
                'member_id' => 17,
            ],
            [
                'tune_id' => 30,
                'member_id' => 23,
            ],
            [
                'tune_id' => 30,
                'member_id' => 24,
            ],
            [
                'tune_id' => 35,
                'member_id' => 37,
            ],
            [
                'tune_id' => 35,
                'member_id' => 44,
            ],
            [
                'tune_id' => 35,
                'member_id' => 45,
            ],
            [
                'tune_id' => 46,
                'member_id' => 7,
            ],
            [
                'tune_id' => 46,
                'member_id' => 13,
            ],
            [
                'tune_id' => 46,
                'member_id' => 14,
            ],
            [
                'tune_id' => 46,
                'member_id' => 15,
            ],
            [
                'tune_id' => 46,
                'member_id' => 16,
            ],
            [
                'tune_id' => 49,
                'member_id' => 17,
            ],
            [
                'tune_id' => 49,
                'member_id' => 23,
            ],
            [
                'tune_id' => 49,
                'member_id' => 24,
            ],
            [
                'tune_id' => 49,
                'member_id' => 25,
            ],
            [
                'tune_id' => 49,
                'member_id' => 26,
            ],
            [
                'tune_id' => 51,
                'member_id' => 37,
            ],
            [
                'tune_id' => 51,
                'member_id' => 43,
            ],
            [
                'tune_id' => 51,
                'member_id' => 44,
            ],
            [
                'tune_id' => 51,
                'member_id' => 45,
            ],
            [
                'tune_id' => 51,
                'member_id' => 46,
            ],
            [
                'tune_id' => 57,
                'member_id' => 7,
            ],
            [
                'tune_id' => 57,
                'member_id' => 13,
            ],
            [
                'tune_id' => 57,
                'member_id' => 14,
            ],
            [
                'tune_id' => 57,
                'member_id' => 15,
            ],
            [
                'tune_id' => 57,
                'member_id' => 16,
            ],
            [
                'tune_id' => 58,
                'member_id' => 27,
            ],
            [
                'tune_id' => 58,
                'member_id' => 33,
            ],
            [
                'tune_id' => 58,
                'member_id' => 34,
            ],
            [
                'tune_id' => 58,
                'member_id' => 35,
            ],
            [
                'tune_id' => 58,
                'member_id' => 36,
            ],
            [
                'tune_id' => 68,
                'member_id' => 43,
            ],
            [
                'tune_id' => 68,
                'member_id' => 44,
            ],
            [
                'tune_id' => 68,
                'member_id' => 45,
            ],
            [
                'tune_id' => 68,
                'member_id' => 46,
            ],
            [
                'tune_id' => 74,
                'member_id' => 20,
            ],
            [
                'tune_id' => 74,
                'member_id' => 23,
            ],
            [
                'tune_id' => 74,
                'member_id' => 24,
            ],
            [
                'tune_id' => 74,
                'member_id' => 25,
            ],
            [
                'tune_id' => 74,
                'member_id' => 26,
            ],
            [
                'tune_id' => 77,
                'member_id' => 7,
            ],
            [
                'tune_id' => 77,
                'member_id' => 13,
            ],
            [
                'tune_id' => 77,
                'member_id' => 14,
            ],
            [
                'tune_id' => 77,
                'member_id' => 15,
            ],
            [
                'tune_id' => 77,
                'member_id' => 16,
            ],
            [
                'tune_id' => 78,
                'member_id' => 28,
            ],
            [
                'tune_id' => 78,
                'member_id' => 30,
            ],
            [
                'tune_id' => 78,
                'member_id' => 33,
            ],
            [
                'tune_id' => 78,
                'member_id' => 34,
            ],
            [
                'tune_id' => 81,
                'member_id' => 47,
            ],
            [
                'tune_id' => 81,
                'member_id' => 53,
            ],
            [
                'tune_id' => 81,
                'member_id' => 54,
            ],
            [
                'tune_id' => 81,
                'member_id' => 55,
            ],
            [
                'tune_id' => 81,
                'member_id' => 56,
            ],
            [
                'tune_id' => 85,
                'member_id' => 32,
            ],
            [
                'tune_id' => 85,
                'member_id' => 35,
            ],
            [
                'tune_id' => 85,
                'member_id' => 36,
            ],
            [
                'tune_id' => 88,
                'member_id' => 18,
            ],
            [
                'tune_id' => 88,
                'member_id' => 23,
            ],
            [
                'tune_id' => 88,
                'member_id' => 24,
            ],
            [
                'tune_id' => 88,
                'member_id' => 25,
            ],
            [
                'tune_id' => 88,
                'member_id' => 26,
            ],
            [
                'tune_id' => 89,
                'member_id' => 39,
            ],
            [
                'tune_id' => 89,
                'member_id' => 43,
            ],
            [
                'tune_id' => 89,
                'member_id' => 44,
            ],
            [
                'tune_id' => 89,
                'member_id' => 45,
            ],
            [
                'tune_id' => 89,
                'member_id' => 46,
            ],
            [
                'tune_id' => 91,
                'member_id' => 51,
            ],
            [
                'tune_id' => 91,
                'member_id' => 53,
            ],
            [
                'tune_id' => 91,
                'member_id' => 54,
            ],
            [
                'tune_id' => 91,
                'member_id' => 55,
            ],
            [
                'tune_id' => 91,
                'member_id' => 56,
            ],
            [
                'tune_id' => 96,
                'member_id' => 32,
            ],
            [
                'tune_id' => 96,
                'member_id' => 33,
            ],
            [
                'tune_id' => 96,
                'member_id' => 34,
            ],
            [
                'tune_id' => 96,
                'member_id' => 35,
            ],
            [
                'tune_id' => 96,
                'member_id' => 36,
            ],
            [
                'tune_id' => 99,
                'member_id' => 7,
            ],
            [
                'tune_id' => 99,
                'member_id' => 13,
            ],
            [
                'tune_id' => 99,
                'member_id' => 14,
            ],
            [
                'tune_id' => 99,
                'member_id' => 15,
            ],
            [
                'tune_id' => 99,
                'member_id' => 16,
            ],
            [
                'tune_id' => 100,
                'member_id' => 17,
            ],
            [
                'tune_id' => 100,
                'member_id' => 25,
            ],
            [
                'tune_id' => 100,
                'member_id' => 26,
            ],
            [
                'tune_id' => 102,
                'member_id' => 42,
            ],
            [
                'tune_id' => 102,
                'member_id' => 43,
            ],
            [
                'tune_id' => 102,
                'member_id' => 44,
            ],
            [
                'tune_id' => 102,
                'member_id' => 45,
            ],
            [
                'tune_id' => 102,
                'member_id' => 46,
            ],
            [
                'tune_id' => 105,
                'member_id' => 7,
            ],
            [
                'tune_id' => 105,
                'member_id' => 13,
            ],
            [
                'tune_id' => 105,
                'member_id' => 14,
            ],
            [
                'tune_id' => 105,
                'member_id' => 15,
            ],
            [
                'tune_id' => 105,
                'member_id' => 16,
            ],
            [
                'tune_id' => 109,
                'member_id' => 47,
            ],
            [
                'tune_id' => 109,
                'member_id' => 53,
            ],
            [
                'tune_id' => 109,
                'member_id' => 54,
            ],
            [
                'tune_id' => 109,
                'member_id' => 55,
            ],
            [
                'tune_id' => 109,
                'member_id' => 56,
            ],
            [
                'tune_id' => 112,
                'member_id' => 19,
            ],
            [
                'tune_id' => 112,
                'member_id' => 23,
            ],
            [
                'tune_id' => 112,
                'member_id' => 24,
            ],
            [
                'tune_id' => 112,
                'member_id' => 25,
            ],
            [
                'tune_id' => 112,
                'member_id' => 26,
            ],
            [
                'tune_id' => 114,
                'member_id' => 29,
            ],
            [
                'tune_id' => 114,
                'member_id' => 33,
            ],
            [
                'tune_id' => 114,
                'member_id' => 34,
            ],
            [
                'tune_id' => 114,
                'member_id' => 35,
            ],
            [
                'tune_id' => 114,
                'member_id' => 36,
            ],
            [
                'tune_id' => 118,
                'member_id' => 48,
            ],
            [
                'tune_id' => 118,
                'member_id' => 53,
            ],
            [
                'tune_id' => 118,
                'member_id' => 54,
            ],
            [
                'tune_id' => 118,
                'member_id' => 55,
            ],
            [
                'tune_id' => 118,
                'member_id' => 56,
            ],
            [
                'tune_id' => 119,
                'member_id' => 1,
            ],
            [
                'tune_id' => 119,
                'member_id' => 13,
            ],
            [
                'tune_id' => 119,
                'member_id' => 23,
            ],
            [
                'tune_id' => 119,
                'member_id' => 33,
            ],
            [
                'tune_id' => 119,
                'member_id' => 43,
            ],
            [
                'tune_id' => 119,
                'member_id' => 53,
            ],
            [
                'tune_id' => 121,
                'member_id' => 8,
            ],
            [
                'tune_id' => 121,
                'member_id' => 13,
            ],
            [
                'tune_id' => 121,
                'member_id' => 14,
            ],
            [
                'tune_id' => 121,
                'member_id' => 15,
            ],
            [
                'tune_id' => 121,
                'member_id' => 16,
            ],
            [
                'tune_id' => 127,
                'member_id' => 28,
            ],
            [
                'tune_id' => 127,
                'member_id' => 33,
            ],
            [
                'tune_id' => 127,
                'member_id' => 34,
            ],
            [
                'tune_id' => 127,
                'member_id' => 35,
            ],
            [
                'tune_id' => 127,
                'member_id' => 36,
            ],
            [
                'tune_id' => 131,
                'member_id' => 7,
            ],
            [
                'tune_id' => 131,
                'member_id' => 13,
            ],
            [
                'tune_id' => 131,
                'member_id' => 14,
            ],
            [
                'tune_id' => 131,
                'member_id' => 15,
            ],
            [
                'tune_id' => 131,
                'member_id' => 16,
            ],
            [
                'tune_id' => 134,
                'member_id' => 38,
            ],
            [
                'tune_id' => 134,
                'member_id' => 43,
            ],
            [
                'tune_id' => 134,
                'member_id' => 44,
            ],
            [
                'tune_id' => 134,
                'member_id' => 45,
            ],
            [
                'tune_id' => 134,
                'member_id' => 46,
            ],
            [
                'tune_id' => 139,
                'member_id' => 9,
            ],
            [
                'tune_id' => 139,
                'member_id' => 13,
            ],
            [
                'tune_id' => 139,
                'member_id' => 14,
            ],
            [
                'tune_id' => 139,
                'member_id' => 15,
            ],
            [
                'tune_id' => 139,
                'member_id' => 16,
            ],
            [
                'tune_id' => 140,
                'member_id' => 17,
            ],
            [
                'tune_id' => 140,
                'member_id' => 23,
            ],
            [
                'tune_id' => 140,
                'member_id' => 24,
            ],
            [
                'tune_id' => 140,
                'member_id' => 25,
            ],
            [
                'tune_id' => 140,
                'member_id' => 26,
            ],
            [
                'tune_id' => 147,
                'member_id' => 30,
            ],
            [
                'tune_id' => 147,
                'member_id' => 33,
            ],
            [
                'tune_id' => 147,
                'member_id' => 34,
            ],
            [
                'tune_id' => 147,
                'member_id' => 35,
            ],
            [
                'tune_id' => 147,
                'member_id' => 36,
            ],
            [
                'tune_id' => 149,
                'member_id' => 54,
            ],
            [
                'tune_id' => 149,
                'member_id' => 56,
            ],
            [
                'tune_id' => 151,
                'member_id' => 17,
            ],
            [
                'tune_id' => 151,
                'member_id' => 24,
            ],
            [
                'tune_id' => 151,
                'member_id' => 26,
            ],
            [
                'tune_id' => 156,
                'member_id' => 37,
            ],
            [
                'tune_id' => 156,
                'member_id' => 43,
            ],
            [
                'tune_id' => 156,
                'member_id' => 44,
            ],
            [
                'tune_id' => 156,
                'member_id' => 45,
            ],
            [
                'tune_id' => 156,
                'member_id' => 46,
            ],
            [
                'tune_id' => 162,
                'member_id' => 47,
            ],
            [
                'tune_id' => 162,
                'member_id' => 54,
            ],
            [
                'tune_id' => 162,
                'member_id' => 55,
            ],
            [
                'tune_id' => 163,
                'member_id' => 29,
            ],
            [
                'tune_id' => 163,
                'member_id' => 33,
            ],
            [
                'tune_id' => 163,
                'member_id' => 34,
            ],
            [
                'tune_id' => 163,
                'member_id' => 35,
            ],
            [
                'tune_id' => 163,
                'member_id' => 36,
            ],
            [
                'tune_id' => 169,
                'member_id' => 1,
            ],
            [
                'tune_id' => 169,
                'member_id' => 13,
            ],
            [
                'tune_id' => 169,
                'member_id' => 23,
            ],
            [
                'tune_id' => 169,
                'member_id' => 33,
            ],
            [
                'tune_id' => 169,
                'member_id' => 43,
            ],
            [
                'tune_id' => 169,
                'member_id' => 53,
            ],
            [
                'tune_id' => 171,
                'member_id' => 38,
            ],
            [
                'tune_id' => 171,
                'member_id' => 43,
            ],
            [
                'tune_id' => 171,
                'member_id' => 44,
            ],
            [
                'tune_id' => 171,
                'member_id' => 45,
            ],
            [
                'tune_id' => 171,
                'member_id' => 46,
            ],
            [
                'tune_id' => 173,
                'member_id' => 48,
            ],
            [
                'tune_id' => 173,
                'member_id' => 53,
            ],
            [
                'tune_id' => 173,
                'member_id' => 54,
            ],
            [
                'tune_id' => 173,
                'member_id' => 55,
            ],
            [
                'tune_id' => 173,
                'member_id' => 56,
            ],
            [
                'tune_id' => 184,
                'member_id' => 10,
            ],
            [
                'tune_id' => 184,
                'member_id' => 13,
            ],
            [
                'tune_id' => 184,
                'member_id' => 14,
            ],
            [
                'tune_id' => 184,
                'member_id' => 15,
            ],
            [
                'tune_id' => 184,
                'member_id' => 16,
            ],
            [
                'tune_id' => 190,
                'member_id' => 17,
            ],
            [
                'tune_id' => 190,
                'member_id' => 23,
            ],
            [
                'tune_id' => 190,
                'member_id' => 24,
            ],
            [
                'tune_id' => 190,
                'member_id' => 25,
            ],
            [
                'tune_id' => 190,
                'member_id' => 26,
            ],
            [
                'tune_id' => 196,
                'member_id' => 37,
            ],
            [
                'tune_id' => 196,
                'member_id' => 43,
            ],
            [
                'tune_id' => 196,
                'member_id' => 44,
            ],
            [
                'tune_id' => 196,
                'member_id' => 45,
            ],
            [
                'tune_id' => 196,
                'member_id' => 46,
            ],
            [
                'tune_id' => 201,
                'member_id' => 17,
            ],
            [
                'tune_id' => 201,
                'member_id' => 23,
            ],
            [
                'tune_id' => 201,
                'member_id' => 24,
            ],
            [
                'tune_id' => 201,
                'member_id' => 25,
            ],
            [
                'tune_id' => 201,
                'member_id' => 26,
            ],
            [
                'tune_id' => 203,
                'member_id' => 41,
            ],
            [
                'tune_id' => 203,
                'member_id' => 43,
            ],
            [
                'tune_id' => 203,
                'member_id' => 44,
            ],
            [
                'tune_id' => 203,
                'member_id' => 45,
            ],
            [
                'tune_id' => 203,
                'member_id' => 46,
            ],
            [
                'tune_id' => 206,
                'member_id' => 47,
            ],
            [
                'tune_id' => 206,
                'member_id' => 53,
            ],
            [
                'tune_id' => 206,
                'member_id' => 54,
            ],
            [
                'tune_id' => 208,
                'member_id' => 27,
            ],
            [
                'tune_id' => 208,
                'member_id' => 33,
            ],
            [
                'tune_id' => 208,
                'member_id' => 34,
            ],
            [
                'tune_id' => 208,
                'member_id' => 35,
            ],
            [
                'tune_id' => 208,
                'member_id' => 36,
            ],
        ];

        DB::table('dancers')->truncate();
        foreach ($records as $record) {
            $entity = new Dancer();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
