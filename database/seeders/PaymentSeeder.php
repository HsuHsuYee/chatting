<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $payments = [
            ['name' => 'KBZ Pay',],
            ['name' => 'Wave'],
        ];

        DB::table('payments')->insert($payments);
    }
}
