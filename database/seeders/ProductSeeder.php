<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            'name' => 'Samsung A1',
            'id_type' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'name' => 'Salat',
            'id_type' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'name' => 'Panci',
            'id_type' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
