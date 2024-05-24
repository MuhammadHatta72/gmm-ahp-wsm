<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'username' => 'admin_tpk',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Administrator 1',
            'email' => 'admin1@gmail.com',
            'username' => 'admin1_tpk',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Vendor',
            'email' => 'vendor@gmail.com',
            'username' => 'vendor_tpk',
            'password' => Hash::make('password'),
            'role' => 'vendor',
        ]);

        DB::table('users')->insert([
            'name' => 'Teknik',
            'email' => 'teknik@gmail.com',
            'username' => 'teknik_tpk',
            'password' => Hash::make('password'),
            'role' => 'teknik',
        ]);
    }
}
