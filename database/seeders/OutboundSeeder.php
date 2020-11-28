<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutboundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('outbounds')->insert([
            'id_customer' =>1,
            'id_employment' =>4,
            'date' =>'2020-11-27',
            'total' =>30000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('outbounds')->insert([
            'id_customer' =>2,
            'id_employment' =>4,
            'date' =>'2020-11-08',
            'total' =>10000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('outbounds')->insert([
            'id_customer' =>3,
            'id_employment' =>4,
            'date' =>'2020-01-25',
            'total' =>100000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
