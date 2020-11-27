<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('po_details')->insert([
          'code_faktur' => 1,
          'faktur' => 1,
          'qty' => 20,
          'price' => 2000,
          'created_at' => now(),
         'updated_at' => now()
        ]);
        DB::table('po_details')->insert([
          'code_faktur' => 2,
          'faktur' => 2,
          'qty' => 10,
          'price' => 1000,
          'created_at' => now(),
          'updated_at' => now()
        ]);
        DB::table('po_details')->insert([
          'code_faktur' => 3,
          'faktur' => 3,
          'qty' => 5,
          'price' => 500,
          'created_at' => now(),
         'updated_at' => now()
        ]);
    }
}
