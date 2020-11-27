<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            'type' => 'Electronik',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'type' => 'Makanan',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('types')->insert([
            'type' => 'Parabotan',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
