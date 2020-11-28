<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InboundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('inbounds')->insert([
            'faktur_po' => 1,
            'date' => '2020-11-27',
            'total' => 40000,
            'status' => 'OK',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('inbounds')->insert([
            'faktur_po' => 2,
            'date' => '2020-11-08',
            'total' => 10000,
            'status' => 'OK',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('inbounds')->insert([
            'faktur_po' => 3,
            'date' => '2020-01-25',
            'total' => 2500,
            'status' => 'OK',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
