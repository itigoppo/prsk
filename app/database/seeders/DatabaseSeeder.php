<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UnitsSeeder::class);
        $this->call(MembersSeeder::class);
//        $this->call(IconsSeeder::class);
//        $this->call(InteractionsSeeder::class);
//        $this->call(ChangeLogsSeeder::class);
        $this->call(TunesSeeder::class);
        $this->call(DancersSeeder::class);
        $this->call(SingersSeeder::class);
    }
}
