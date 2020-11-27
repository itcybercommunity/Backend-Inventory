<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoadblockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roadblocks')->insert([
            'faktur_outbound' => 2,
            'id_employment' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roadblocks')->insert([
            'faktur_outbound' => 3,
            'id_employment' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
