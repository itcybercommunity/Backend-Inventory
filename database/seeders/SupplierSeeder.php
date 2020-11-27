<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'name' => 'Joni',
            'address' => 'Parung'
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Beo',
            'address' => 'Tangerang'
        ]);
        DB::table('suppliers')->insert([
            'name' => 'Kobe',
            'address' => 'Jakarta'
        ]);
    }
}
