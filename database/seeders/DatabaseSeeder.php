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
        $this->call(CriteriaSeeder::class);

        // reverse seed
        $this->call(AlatMasterSeeder::class);
        // $this->call(AlatTableSeeder::class);
        $this->call(KriteriaTableSeeder::class);
        $this->call(BobotTableSeeder::class);
        $this->call(GeomeansTableSeeder::class);
    }
}
