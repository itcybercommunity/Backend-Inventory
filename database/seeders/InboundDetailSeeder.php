<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InboundDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('inbound_details')->insert([
            'faktur_inbound' => 1,
            'faktur_po_detail' => 1,
            'qty' => 20,
            'price_sell' => 3000,
            'created_at' => now(),
            'updated_at' => now()
            ]);
        DB::table('inbound_details')->insert([
            'faktur_inbound' => 2,
            'faktur_po_detail' => 2,
            'qty' => 10,
            'price_sell' => 2000,
            'created_at' => now(),
            'updated_at' => now()
            ]);
        DB::table('inbound_details')->insert([
            'faktur_inbound' => 3,
            'faktur_po_detail' => 3,
            'qty' => 5,
            'price_sell' => 1000,
            'created_at' => now(),
            'updated_at' => now()
            ]);
    }
}
