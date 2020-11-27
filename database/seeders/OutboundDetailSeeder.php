<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutboundDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('outbound_details')->insert([
            'faktur_outbound' => 2,
            'faktur_inbound_detail' => 1,
            'qty' => 10,
            'total' => 15000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('outbound_details')->insert([
            'faktur_outbound' => 3,
            'faktur_inbound_detail' => 2,
            'qty' => 5,
            'total' => 10000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('outbound_details')->insert([
            'faktur_outbound' => 4,
            'faktur_inbound_detail' => 3,
            'qty' => 5,
            'total' => 5000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

}
