<?php

namespace Database\Seeders;

use App\Models\EventCard;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventCardsSeeder extends Seeder
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
                'is_banner' => true,
                'card_id' => 87,
            ],
            [
                'event_id' => 1,
                'is_banner' => false,
                'card_id' => 88,
            ],
            [
                'event_id' => 1,
                'is_banner' => false,
                'card_id' => 89,
            ],
            [
                'event_id' => 1,
                'is_banner' => false,
                'card_id' => 90,
            ],
            [
                'event_id' => 1,
                'is_banner' => false,
                'card_id' => 91,
            ],
            [
                'event_id' => 2,
                'is_banner' => true,
                'card_id' => 92,
            ],
            [
                'event_id' => 2,
                'is_banner' => false,
                'card_id' => 93,
            ],
            [
                'event_id' => 2,
                'is_banner' => false,
                'card_id' => 94,
            ],
            [
                'event_id' => 2,
                'is_banner' => false,
                'card_id' => 95,
            ],
            [
                'event_id' => 2,
                'is_banner' => false,
                'card_id' => 96,
            ],
            [
                'event_id' => 3,
                'is_banner' => true,
                'card_id' => 97,
            ],
            [
                'event_id' => 3,
                'is_banner' => false,
                'card_id' => 98,
            ],
            [
                'event_id' => 3,
                'is_banner' => false,
                'card_id' => 99,
            ],
            [
                'event_id' => 3,
                'is_banner' => false,
                'card_id' => 100,
            ],
            [
                'event_id' => 3,
                'is_banner' => false,
                'card_id' => 101,
            ],
            [
                'event_id' => 4,
                'is_banner' => true,
                'card_id' => 102,
            ],
            [
                'event_id' => 4,
                'is_banner' => false,
                'card_id' => 103,
            ],
            [
                'event_id' => 4,
                'is_banner' => false,
                'card_id' => 104,
            ],
            [
                'event_id' => 4,
                'is_banner' => false,
                'card_id' => 105,
            ],
            [
                'event_id' => 4,
                'is_banner' => false,
                'card_id' => 106,
            ],
            [
                'event_id' => 5,
                'is_banner' => true,
                'card_id' => 107,
            ],
            [
                'event_id' => 5,
                'is_banner' => false,
                'card_id' => 108,
            ],
            [
                'event_id' => 5,
                'is_banner' => false,
                'card_id' => 109,
            ],
            [
                'event_id' => 5,
                'is_banner' => false,
                'card_id' => 110,
            ],
            [
                'event_id' => 5,
                'is_banner' => false,
                'card_id' => 111,
            ],
            [
                'event_id' => 6,
                'is_banner' => true,
                'card_id' => 112,
            ],
            [
                'event_id' => 6,
                'is_banner' => false,
                'card_id' => 113,
            ],
            [
                'event_id' => 6,
                'is_banner' => false,
                'card_id' => 114,
            ],
            [
                'event_id' => 6,
                'is_banner' => false,
                'card_id' => 115,
            ],
            [
                'event_id' => 6,
                'is_banner' => false,
                'card_id' => 116,
            ],
            [
                'event_id' => 7,
                'is_banner' => true,
                'card_id' => 117,
            ],
            [
                'event_id' => 7,
                'is_banner' => false,
                'card_id' => 118,
            ],
            [
                'event_id' => 7,
                'is_banner' => false,
                'card_id' => 119,
            ],
            [
                'event_id' => 7,
                'is_banner' => false,
                'card_id' => 120,
            ],
            [
                'event_id' => 7,
                'is_banner' => false,
                'card_id' => 121,
            ],
            [
                'event_id' => 8,
                'is_banner' => true,
                'card_id' => 122,
            ],
            [
                'event_id' => 8,
                'is_banner' => false,
                'card_id' => 123,
            ],
            [
                'event_id' => 8,
                'is_banner' => false,
                'card_id' => 124,
            ],
            [
                'event_id' => 8,
                'is_banner' => false,
                'card_id' => 125,
            ],
            [
                'event_id' => 8,
                'is_banner' => false,
                'card_id' => 126,
            ],
            [
                'event_id' => 9,
                'is_banner' => true,
                'card_id' => 127,
            ],
            [
                'event_id' => 9,
                'is_banner' => false,
                'card_id' => 128,
            ],
            [
                'event_id' => 9,
                'is_banner' => false,
                'card_id' => 129,
            ],
            [
                'event_id' => 9,
                'is_banner' => false,
                'card_id' => 130,
            ],
            [
                'event_id' => 9,
                'is_banner' => false,
                'card_id' => 131,
            ],
            [
                'event_id' => 9,
                'is_banner' => false,
                'card_id' => 132,
            ],
            [
                'event_id' => 10,
                'is_banner' => true,
                'card_id' => 133,
            ],
            [
                'event_id' => 10,
                'is_banner' => false,
                'card_id' => 134,
            ],
            [
                'event_id' => 10,
                'is_banner' => false,
                'card_id' => 135,
            ],
            [
                'event_id' => 10,
                'is_banner' => false,
                'card_id' => 136,
            ],
            [
                'event_id' => 10,
                'is_banner' => false,
                'card_id' => 137,
            ],
            [
                'event_id' => 11,
                'is_banner' => true,
                'card_id' => 138,
            ],
            [
                'event_id' => 11,
                'is_banner' => false,
                'card_id' => 139,
            ],
            [
                'event_id' => 11,
                'is_banner' => false,
                'card_id' => 140,
            ],
            [
                'event_id' => 11,
                'is_banner' => false,
                'card_id' => 141,
            ],
            [
                'event_id' => 11,
                'is_banner' => false,
                'card_id' => 142,
            ],
            [
                'event_id' => 12,
                'is_banner' => true,
                'card_id' => 143,
            ],
            [
                'event_id' => 12,
                'is_banner' => false,
                'card_id' => 144,
            ],
            [
                'event_id' => 12,
                'is_banner' => false,
                'card_id' => 145,
            ],
            [
                'event_id' => 12,
                'is_banner' => false,
                'card_id' => 146,
            ],
            [
                'event_id' => 12,
                'is_banner' => false,
                'card_id' => 147,
            ],
            [
                'event_id' => 13,
                'is_banner' => true,
                'card_id' => 148,
            ],
            [
                'event_id' => 13,
                'is_banner' => false,
                'card_id' => 149,
            ],
            [
                'event_id' => 13,
                'is_banner' => false,
                'card_id' => 150,
            ],
            [
                'event_id' => 13,
                'is_banner' => false,
                'card_id' => 151,
            ],
            [
                'event_id' => 13,
                'is_banner' => false,
                'card_id' => 152,
            ],
            [
                'event_id' => 14,
                'is_banner' => true,
                'card_id' => 153,
            ],
            [
                'event_id' => 14,
                'is_banner' => false,
                'card_id' => 154,
            ],
            [
                'event_id' => 14,
                'is_banner' => false,
                'card_id' => 155,
            ],
            [
                'event_id' => 14,
                'is_banner' => false,
                'card_id' => 156,
            ],
            [
                'event_id' => 14,
                'is_banner' => false,
                'card_id' => 157,
            ],
            [
                'event_id' => 15,
                'is_banner' => true,
                'card_id' => 158,
            ],
            [
                'event_id' => 15,
                'is_banner' => false,
                'card_id' => 159,
            ],
            [
                'event_id' => 15,
                'is_banner' => false,
                'card_id' => 160,
            ],
            [
                'event_id' => 15,
                'is_banner' => false,
                'card_id' => 161,
            ],
            [
                'event_id' => 15,
                'is_banner' => false,
                'card_id' => 162,
            ],
            [
                'event_id' => 16,
                'is_banner' => true,
                'card_id' => 163,
            ],
            [
                'event_id' => 16,
                'is_banner' => false,
                'card_id' => 164,
            ],
            [
                'event_id' => 16,
                'is_banner' => false,
                'card_id' => 165,
            ],
            [
                'event_id' => 16,
                'is_banner' => false,
                'card_id' => 166,
            ],
            [
                'event_id' => 16,
                'is_banner' => false,
                'card_id' => 167,
            ],
            [
                'event_id' => 17,
                'is_banner' => true,
                'card_id' => 168,
            ],
            [
                'event_id' => 17,
                'is_banner' => false,
                'card_id' => 169,
            ],
            [
                'event_id' => 17,
                'is_banner' => false,
                'card_id' => 170,
            ],
            [
                'event_id' => 17,
                'is_banner' => false,
                'card_id' => 171,
            ],
            [
                'event_id' => 17,
                'is_banner' => false,
                'card_id' => 172,
            ],
            [
                'event_id' => 18,
                'is_banner' => true,
                'card_id' => 175,
            ],
            [
                'event_id' => 18,
                'is_banner' => false,
                'card_id' => 176,
            ],
            [
                'event_id' => 18,
                'is_banner' => false,
                'card_id' => 177,
            ],
            [
                'event_id' => 18,
                'is_banner' => false,
                'card_id' => 178,
            ],
            [
                'event_id' => 18,
                'is_banner' => false,
                'card_id' => 179,
            ],
            [
                'event_id' => 19,
                'is_banner' => true,
                'card_id' => 180,
            ],
            [
                'event_id' => 19,
                'is_banner' => false,
                'card_id' => 181,
            ],
            [
                'event_id' => 19,
                'is_banner' => false,
                'card_id' => 182,
            ],
            [
                'event_id' => 19,
                'is_banner' => false,
                'card_id' => 183,
            ],
            [
                'event_id' => 19,
                'is_banner' => false,
                'card_id' => 184,
            ],
            [
                'event_id' => 20,
                'is_banner' => true,
                'card_id' => 185,
            ],
            [
                'event_id' => 20,
                'is_banner' => false,
                'card_id' => 186,
            ],
            [
                'event_id' => 20,
                'is_banner' => false,
                'card_id' => 187,
            ],
            [
                'event_id' => 20,
                'is_banner' => false,
                'card_id' => 188,
            ],
            [
                'event_id' => 20,
                'is_banner' => false,
                'card_id' => 189,
            ],
            [
                'event_id' => 21,
                'is_banner' => true,
                'card_id' => 190,
            ],
            [
                'event_id' => 21,
                'is_banner' => false,
                'card_id' => 191,
            ],
            [
                'event_id' => 21,
                'is_banner' => false,
                'card_id' => 192,
            ],
            [
                'event_id' => 21,
                'is_banner' => false,
                'card_id' => 193,
            ],
            [
                'event_id' => 21,
                'is_banner' => false,
                'card_id' => 194,
            ],
            [
                'event_id' => 22,
                'is_banner' => true,
                'card_id' => 195,
            ],
            [
                'event_id' => 22,
                'is_banner' => false,
                'card_id' => 196,
            ],
            [
                'event_id' => 22,
                'is_banner' => false,
                'card_id' => 197,
            ],
            [
                'event_id' => 22,
                'is_banner' => false,
                'card_id' => 198,
            ],
            [
                'event_id' => 22,
                'is_banner' => false,
                'card_id' => 199,
            ],
            [
                'event_id' => 23,
                'is_banner' => true,
                'card_id' => 200,
            ],
            [
                'event_id' => 23,
                'is_banner' => false,
                'card_id' => 201,
            ],
            [
                'event_id' => 23,
                'is_banner' => false,
                'card_id' => 202,
            ],
            [
                'event_id' => 23,
                'is_banner' => false,
                'card_id' => 203,
            ],
            [
                'event_id' => 23,
                'is_banner' => false,
                'card_id' => 204,
            ],
            [
                'event_id' => 24,
                'is_banner' => true,
                'card_id' => 205,
            ],
            [
                'event_id' => 24,
                'is_banner' => false,
                'card_id' => 206,
            ],
            [
                'event_id' => 24,
                'is_banner' => false,
                'card_id' => 207,
            ],
            [
                'event_id' => 24,
                'is_banner' => false,
                'card_id' => 208,
            ],
            [
                'event_id' => 24,
                'is_banner' => false,
                'card_id' => 209,
            ],
            [
                'event_id' => 25,
                'is_banner' => true,
                'card_id' => 210,
            ],
            [
                'event_id' => 25,
                'is_banner' => false,
                'card_id' => 211,
            ],
            [
                'event_id' => 25,
                'is_banner' => false,
                'card_id' => 212,
            ],
            [
                'event_id' => 25,
                'is_banner' => false,
                'card_id' => 213,
            ],
            [
                'event_id' => 25,
                'is_banner' => false,
                'card_id' => 214,
            ],
            [
                'event_id' => 26,
                'is_banner' => true,
                'card_id' => 215,
            ],
            [
                'event_id' => 26,
                'is_banner' => false,
                'card_id' => 216,
            ],
            [
                'event_id' => 26,
                'is_banner' => false,
                'card_id' => 217,
            ],
            [
                'event_id' => 26,
                'is_banner' => false,
                'card_id' => 218,
            ],
            [
                'event_id' => 26,
                'is_banner' => false,
                'card_id' => 219,
            ],
            [
                'event_id' => 27,
                'is_banner' => true,
                'card_id' => 222,
            ],
            [
                'event_id' => 27,
                'is_banner' => false,
                'card_id' => 223,
            ],
            [
                'event_id' => 27,
                'is_banner' => false,
                'card_id' => 224,
            ],
            [
                'event_id' => 27,
                'is_banner' => false,
                'card_id' => 225,
            ],
            [
                'event_id' => 27,
                'is_banner' => false,
                'card_id' => 226,
            ],
            [
                'event_id' => 28,
                'is_banner' => true,
                'card_id' => 227,
            ],
            [
                'event_id' => 28,
                'is_banner' => false,
                'card_id' => 228,
            ],
            [
                'event_id' => 28,
                'is_banner' => false,
                'card_id' => 229,
            ],
            [
                'event_id' => 28,
                'is_banner' => false,
                'card_id' => 230,
            ],
            [
                'event_id' => 28,
                'is_banner' => false,
                'card_id' => 231,
            ],
            [
                'event_id' => 29,
                'is_banner' => true,
                'card_id' => 232,
            ],
            [
                'event_id' => 29,
                'is_banner' => false,
                'card_id' => 233,
            ],
            [
                'event_id' => 29,
                'is_banner' => false,
                'card_id' => 234,
            ],
            [
                'event_id' => 29,
                'is_banner' => false,
                'card_id' => 235,
            ],
            [
                'event_id' => 29,
                'is_banner' => false,
                'card_id' => 236,
            ],
            [
                'event_id' => 30,
                'is_banner' => true,
                'card_id' => 237,
            ],
            [
                'event_id' => 30,
                'is_banner' => false,
                'card_id' => 238,
            ],
            [
                'event_id' => 30,
                'is_banner' => false,
                'card_id' => 239,
            ],
            [
                'event_id' => 30,
                'is_banner' => false,
                'card_id' => 240,
            ],
            [
                'event_id' => 30,
                'is_banner' => false,
                'card_id' => 241,
            ],
            [
                'event_id' => 31,
                'is_banner' => true,
                'card_id' => 242,
            ],
            [
                'event_id' => 31,
                'is_banner' => false,
                'card_id' => 243,
            ],
            [
                'event_id' => 31,
                'is_banner' => false,
                'card_id' => 244,
            ],
            [
                'event_id' => 31,
                'is_banner' => false,
                'card_id' => 245,
            ],
            [
                'event_id' => 31,
                'is_banner' => false,
                'card_id' => 246,
            ],
            [
                'event_id' => 32,
                'is_banner' => true,
                'card_id' => 247,
            ],
            [
                'event_id' => 32,
                'is_banner' => false,
                'card_id' => 248,
            ],
            [
                'event_id' => 32,
                'is_banner' => false,
                'card_id' => 249,
            ],
            [
                'event_id' => 32,
                'is_banner' => false,
                'card_id' => 250,
            ],
            [
                'event_id' => 32,
                'is_banner' => false,
                'card_id' => 251,
            ],
            [
                'event_id' => 33,
                'is_banner' => true,
                'card_id' => 252,
            ],
            [
                'event_id' => 33,
                'is_banner' => false,
                'card_id' => 253,
            ],
            [
                'event_id' => 33,
                'is_banner' => false,
                'card_id' => 254,
            ],
            [
                'event_id' => 33,
                'is_banner' => false,
                'card_id' => 255,
            ],
            [
                'event_id' => 33,
                'is_banner' => false,
                'card_id' => 256,
            ],
            [
                'event_id' => 34,
                'is_banner' => true,
                'card_id' => 257,
            ],
            [
                'event_id' => 34,
                'is_banner' => false,
                'card_id' => 258,
            ],
            [
                'event_id' => 34,
                'is_banner' => false,
                'card_id' => 259,
            ],
            [
                'event_id' => 34,
                'is_banner' => false,
                'card_id' => 260,
            ],
            [
                'event_id' => 34,
                'is_banner' => false,
                'card_id' => 261,
            ],
            [
                'event_id' => 35,
                'is_banner' => true,
                'card_id' => 262,
            ],
            [
                'event_id' => 35,
                'is_banner' => false,
                'card_id' => 263,
            ],
            [
                'event_id' => 35,
                'is_banner' => false,
                'card_id' => 264,
            ],
            [
                'event_id' => 35,
                'is_banner' => false,
                'card_id' => 265,
            ],
            [
                'event_id' => 35,
                'is_banner' => false,
                'card_id' => 266,
            ],
            [
                'event_id' => 36,
                'is_banner' => true,
                'card_id' => 269,
            ],
            [
                'event_id' => 36,
                'is_banner' => false,
                'card_id' => 270,
            ],
            [
                'event_id' => 36,
                'is_banner' => false,
                'card_id' => 271,
            ],
            [
                'event_id' => 36,
                'is_banner' => false,
                'card_id' => 272,
            ],
            [
                'event_id' => 37,
                'is_banner' => true,
                'card_id' => 274,
            ],
            [
                'event_id' => 37,
                'is_banner' => false,
                'card_id' => 275,
            ],
            [
                'event_id' => 37,
                'is_banner' => false,
                'card_id' => 276,
            ],
            [
                'event_id' => 37,
                'is_banner' => false,
                'card_id' => 277,
            ],
            [
                'event_id' => 37,
                'is_banner' => false,
                'card_id' => 278,
            ],
            [
                'event_id' => 38,
                'is_banner' => true,
                'card_id' => 279,
            ],
            [
                'event_id' => 38,
                'is_banner' => false,
                'card_id' => 280,
            ],
            [
                'event_id' => 38,
                'is_banner' => false,
                'card_id' => 281,
            ],
            [
                'event_id' => 38,
                'is_banner' => false,
                'card_id' => 282,
            ],
            [
                'event_id' => 38,
                'is_banner' => false,
                'card_id' => 283,
            ],
            [
                'event_id' => 39,
                'is_banner' => true,
                'card_id' => 285,
            ],
            [
                'event_id' => 39,
                'is_banner' => false,
                'card_id' => 286,
            ],
            [
                'event_id' => 39,
                'is_banner' => false,
                'card_id' => 287,
            ],
            [
                'event_id' => 39,
                'is_banner' => false,
                'card_id' => 288,
            ],
            [
                'event_id' => 39,
                'is_banner' => false,
                'card_id' => 289,
            ],
            [
                'event_id' => 40,
                'is_banner' => true,
                'card_id' => 291,
            ],
            [
                'event_id' => 40,
                'is_banner' => false,
                'card_id' => 292,
            ],
            [
                'event_id' => 40,
                'is_banner' => false,
                'card_id' => 293,
            ],
            [
                'event_id' => 40,
                'is_banner' => false,
                'card_id' => 294,
            ],
            [
                'event_id' => 40,
                'is_banner' => false,
                'card_id' => 295,
            ],
            [
                'event_id' => 41,
                'is_banner' => true,
                'card_id' => 297,
            ],
            [
                'event_id' => 41,
                'is_banner' => false,
                'card_id' => 298,
            ],
            [
                'event_id' => 41,
                'is_banner' => false,
                'card_id' => 299,
            ],
            [
                'event_id' => 41,
                'is_banner' => false,
                'card_id' => 300,
            ],
            [
                'event_id' => 41,
                'is_banner' => false,
                'card_id' => 301,
            ],
            [
                'event_id' => 42,
                'is_banner' => true,
                'card_id' => 302,
            ],
            [
                'event_id' => 42,
                'is_banner' => false,
                'card_id' => 303,
            ],
            [
                'event_id' => 42,
                'is_banner' => false,
                'card_id' => 304,
            ],
            [
                'event_id' => 42,
                'is_banner' => false,
                'card_id' => 305,
            ],
            [
                'event_id' => 42,
                'is_banner' => false,
                'card_id' => 306,
            ],
            [
                'event_id' => 43,
                'is_banner' => true,
                'card_id' => 308,
            ],
            [
                'event_id' => 43,
                'is_banner' => false,
                'card_id' => 309,
            ],
            [
                'event_id' => 43,
                'is_banner' => false,
                'card_id' => 310,
            ],
            [
                'event_id' => 43,
                'is_banner' => false,
                'card_id' => 311,
            ],
            [
                'event_id' => 43,
                'is_banner' => false,
                'card_id' => 312,
            ],
            [
                'event_id' => 44,
                'is_banner' => true,
                'card_id' => 319,
            ],
            [
                'event_id' => 44,
                'is_banner' => false,
                'card_id' => 320,
            ],
            [
                'event_id' => 44,
                'is_banner' => false,
                'card_id' => 321,
            ],
            [
                'event_id' => 44,
                'is_banner' => false,
                'card_id' => 322,
            ],
            [
                'event_id' => 44,
                'is_banner' => false,
                'card_id' => 323,
            ],
            [
                'event_id' => 45,
                'is_banner' => true,
                'card_id' => 328,
            ],
            [
                'event_id' => 45,
                'is_banner' => false,
                'card_id' => 329,
            ],
            [
                'event_id' => 45,
                'is_banner' => false,
                'card_id' => 330,
            ],
            [
                'event_id' => 45,
                'is_banner' => false,
                'card_id' => 331,
            ],
            [
                'event_id' => 45,
                'is_banner' => false,
                'card_id' => 332,
            ],
            [
                'event_id' => 46,
                'is_banner' => true,
                'card_id' => 334,
            ],
            [
                'event_id' => 46,
                'is_banner' => false,
                'card_id' => 335,
            ],
            [
                'event_id' => 46,
                'is_banner' => false,
                'card_id' => 336,
            ],
            [
                'event_id' => 46,
                'is_banner' => false,
                'card_id' => 337,
            ],
            [
                'event_id' => 46,
                'is_banner' => false,
                'card_id' => 338,
            ],
            [
                'event_id' => 47,
                'is_banner' => true,
                'card_id' => 339,
            ],
            [
                'event_id' => 47,
                'is_banner' => false,
                'card_id' => 340,
            ],
            [
                'event_id' => 47,
                'is_banner' => false,
                'card_id' => 341,
            ],
            [
                'event_id' => 47,
                'is_banner' => false,
                'card_id' => 342,
            ],
            [
                'event_id' => 47,
                'is_banner' => false,
                'card_id' => 343,
            ],
            [
                'event_id' => 48,
                'is_banner' => true,
                'card_id' => 346,
            ],
            [
                'event_id' => 48,
                'is_banner' => false,
                'card_id' => 347,
            ],
            [
                'event_id' => 48,
                'is_banner' => false,
                'card_id' => 348,
            ],
            [
                'event_id' => 48,
                'is_banner' => false,
                'card_id' => 349,
            ],
            [
                'event_id' => 48,
                'is_banner' => false,
                'card_id' => 350,
            ],
            [
                'event_id' => 49,
                'is_banner' => true,
                'card_id' => 351,
            ],
            [
                'event_id' => 49,
                'is_banner' => false,
                'card_id' => 352,
            ],
            [
                'event_id' => 49,
                'is_banner' => false,
                'card_id' => 353,
            ],
            [
                'event_id' => 49,
                'is_banner' => false,
                'card_id' => 354,
            ],
            [
                'event_id' => 49,
                'is_banner' => false,
                'card_id' => 355,
            ],
            [
                'event_id' => 50,
                'is_banner' => true,
                'card_id' => 358,
            ],
            [
                'event_id' => 50,
                'is_banner' => false,
                'card_id' => 359,
            ],
            [
                'event_id' => 50,
                'is_banner' => false,
                'card_id' => 360,
            ],
            [
                'event_id' => 50,
                'is_banner' => false,
                'card_id' => 361,
            ],
            [
                'event_id' => 50,
                'is_banner' => false,
                'card_id' => 362,
            ],
            [
                'event_id' => 51,
                'is_banner' => true,
                'card_id' => 363,
            ],
            [
                'event_id' => 51,
                'is_banner' => false,
                'card_id' => 364,
            ],
            [
                'event_id' => 51,
                'is_banner' => false,
                'card_id' => 365,
            ],
            [
                'event_id' => 51,
                'is_banner' => false,
                'card_id' => 366,
            ],
            [
                'event_id' => 51,
                'is_banner' => false,
                'card_id' => 367,
            ],
            [
                'event_id' => 52,
                'is_banner' => true,
                'card_id' => 369,
            ],
            [
                'event_id' => 52,
                'is_banner' => false,
                'card_id' => 370,
            ],
            [
                'event_id' => 52,
                'is_banner' => false,
                'card_id' => 371,
            ],
            [
                'event_id' => 52,
                'is_banner' => false,
                'card_id' => 372,
            ],
            [
                'event_id' => 52,
                'is_banner' => false,
                'card_id' => 373,
            ],
            [
                'event_id' => 53,
                'is_banner' => true,
                'card_id' => 375,
            ],
            [
                'event_id' => 53,
                'is_banner' => false,
                'card_id' => 376,
            ],
            [
                'event_id' => 53,
                'is_banner' => false,
                'card_id' => 377,
            ],
            [
                'event_id' => 53,
                'is_banner' => false,
                'card_id' => 378,
            ],
            [
                'event_id' => 53,
                'is_banner' => false,
                'card_id' => 379,
            ],
            [
                'event_id' => 54,
                'is_banner' => true,
                'card_id' => 382,
            ],
            [
                'event_id' => 54,
                'is_banner' => false,
                'card_id' => 383,
            ],
            [
                'event_id' => 54,
                'is_banner' => false,
                'card_id' => 384,
            ],
            [
                'event_id' => 54,
                'is_banner' => false,
                'card_id' => 385,
            ],
            [
                'event_id' => 54,
                'is_banner' => false,
                'card_id' => 386,
            ],
            [
                'event_id' => 54,
                'is_banner' => false,
                'card_id' => 387,
            ],
            [
                'event_id' => 55,
                'is_banner' => true,
                'card_id' => 388,
            ],
            [
                'event_id' => 55,
                'is_banner' => false,
                'card_id' => 389,
            ],
            [
                'event_id' => 55,
                'is_banner' => false,
                'card_id' => 390,
            ],
            [
                'event_id' => 55,
                'is_banner' => false,
                'card_id' => 391,
            ],
            [
                'event_id' => 55,
                'is_banner' => false,
                'card_id' => 392,
            ],
            [
                'event_id' => 56,
                'is_banner' => true,
                'card_id' => 394,
            ],
            [
                'event_id' => 56,
                'is_banner' => false,
                'card_id' => 395,
            ],
            [
                'event_id' => 56,
                'is_banner' => false,
                'card_id' => 396,
            ],
            [
                'event_id' => 56,
                'is_banner' => false,
                'card_id' => 397,
            ],
            [
                'event_id' => 56,
                'is_banner' => false,
                'card_id' => 398,
            ],
            [
                'event_id' => 57,
                'is_banner' => true,
                'card_id' => 400,
            ],
            [
                'event_id' => 57,
                'is_banner' => false,
                'card_id' => 401,
            ],
            [
                'event_id' => 57,
                'is_banner' => false,
                'card_id' => 402,
            ],
            [
                'event_id' => 57,
                'is_banner' => false,
                'card_id' => 403,
            ],
            [
                'event_id' => 57,
                'is_banner' => false,
                'card_id' => 404,
            ],
            [
                'event_id' => 58,
                'is_banner' => true,
                'card_id' => 406,
            ],
            [
                'event_id' => 58,
                'is_banner' => false,
                'card_id' => 407,
            ],
            [
                'event_id' => 58,
                'is_banner' => false,
                'card_id' => 408,
            ],
            [
                'event_id' => 58,
                'is_banner' => false,
                'card_id' => 409,
            ],
            [
                'event_id' => 58,
                'is_banner' => false,
                'card_id' => 410,
            ],
            [
                'event_id' => 59,
                'is_banner' => true,
                'card_id' => 412,
            ],
            [
                'event_id' => 59,
                'is_banner' => false,
                'card_id' => 413,
            ],
            [
                'event_id' => 59,
                'is_banner' => false,
                'card_id' => 414,
            ],
            [
                'event_id' => 59,
                'is_banner' => false,
                'card_id' => 415,
            ],
            [
                'event_id' => 59,
                'is_banner' => false,
                'card_id' => 416,
            ],
            [
                'event_id' => 60,
                'is_banner' => true,
                'card_id' => 418,
            ],
            [
                'event_id' => 60,
                'is_banner' => false,
                'card_id' => 419,
            ],
            [
                'event_id' => 60,
                'is_banner' => false,
                'card_id' => 420,
            ],
            [
                'event_id' => 60,
                'is_banner' => false,
                'card_id' => 421,
            ],
            [
                'event_id' => 60,
                'is_banner' => false,
                'card_id' => 422,
            ],
            [
                'event_id' => 61,
                'is_banner' => true,
                'card_id' => 423,
            ],
            [
                'event_id' => 61,
                'is_banner' => false,
                'card_id' => 424,
            ],
            [
                'event_id' => 61,
                'is_banner' => false,
                'card_id' => 425,
            ],
            [
                'event_id' => 61,
                'is_banner' => false,
                'card_id' => 426,
            ],
            [
                'event_id' => 61,
                'is_banner' => false,
                'card_id' => 427,
            ],
            [
                'event_id' => 62,
                'is_banner' => true,
                'card_id' => 428,
            ],
            [
                'event_id' => 62,
                'is_banner' => false,
                'card_id' => 429,
            ],
            [
                'event_id' => 62,
                'is_banner' => false,
                'card_id' => 430,
            ],
            [
                'event_id' => 62,
                'is_banner' => false,
                'card_id' => 431,
            ],
            [
                'event_id' => 62,
                'is_banner' => false,
                'card_id' => 432,
            ],
            [
                'event_id' => 63,
                'is_banner' => true,
                'card_id' => 436,
            ],
            [
                'event_id' => 63,
                'is_banner' => false,
                'card_id' => 437,
            ],
            [
                'event_id' => 63,
                'is_banner' => false,
                'card_id' => 438,
            ],
            [
                'event_id' => 63,
                'is_banner' => false,
                'card_id' => 439,
            ],
            [
                'event_id' => 63,
                'is_banner' => false,
                'card_id' => 440,
            ],
            [
                'event_id' => 64,
                'is_banner' => true,
                'card_id' => 441,
            ],
            [
                'event_id' => 64,
                'is_banner' => false,
                'card_id' => 442,
            ],
            [
                'event_id' => 64,
                'is_banner' => false,
                'card_id' => 443,
            ],
            [
                'event_id' => 64,
                'is_banner' => false,
                'card_id' => 444,
            ],
            [
                'event_id' => 64,
                'is_banner' => false,
                'card_id' => 445,
            ],
            [
                'event_id' => 65,
                'is_banner' => true,
                'card_id' => 447,
            ],
            [
                'event_id' => 65,
                'is_banner' => false,
                'card_id' => 448,
            ],
            [
                'event_id' => 65,
                'is_banner' => false,
                'card_id' => 449,
            ],
            [
                'event_id' => 65,
                'is_banner' => false,
                'card_id' => 450,
            ],
            [
                'event_id' => 65,
                'is_banner' => false,
                'card_id' => 451,
            ],
            [
                'event_id' => 66,
                'is_banner' => true,
                'card_id' => 453,
            ],
            [
                'event_id' => 66,
                'is_banner' => false,
                'card_id' => 454,
            ],
            [
                'event_id' => 66,
                'is_banner' => false,
                'card_id' => 455,
            ],
            [
                'event_id' => 66,
                'is_banner' => false,
                'card_id' => 456,
            ],
            [
                'event_id' => 66,
                'is_banner' => false,
                'card_id' => 457,
            ],

        ];

        DB::table('event_cards')->truncate();
        foreach ($records as $record) {
            $entity = new EventCard();
            foreach ($record as $key => $value) {
                $entity->setAttribute($key, $value);
            }
            $entity->save();
        }
    }
}
