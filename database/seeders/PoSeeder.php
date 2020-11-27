<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pos')->insert([
            'date' => '2020-11-27',
            'total' => 40000,
            'id_employment' => 3,
            'id_supplier' => 1, 
            'status' => "Lengkap", 
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('pos')->insert([
            'date' => '2020-11-26',
            'total' => 10000,
            'id_employment' => 3,
            'id_supplier' => 2, 
            'status' => "Lengkap", 
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('pos')->insert([
            'date' => '2020-11-25',
            'total' => 2500,
            'id_employment' => 3,
            'id_supplier' => 3, 
            'status' => "Lengkap", 
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
