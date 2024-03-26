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
        $this->call(UserSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(GeomeansTableSeeder::class);
        $this->call(KriteriaTableSeeder::class);
        $this->call(BobotTableSeeder::class);
    }
}
