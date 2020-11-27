<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('returs')->insert([
            'date' =>'2020-11-27',
            'qty' =>3,
            'reason' =>'return',
            'id_outbound_detail' =>2,
            'id_roadblock' =>2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('returs')->insert([
            'date' =>'2020-11-26',
            'qty' =>3,
            'reason' =>'return',
            'id_outbound_detail' =>3,
            'id_roadblock' =>2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
