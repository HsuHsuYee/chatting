<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'address' => '123 Admin St', // or any default address you want
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Su Thingyan',
            'email' => 'su@gmail.com',
            'password' => bcrypt('password'),
            'address' => 'Yangon', // or any default address you want
            'role' => 'user',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
