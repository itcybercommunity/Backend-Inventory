<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('employments')->insert([
            'name'=> 'Gogo',
            'gender'=> 'L',
            'email'=> 'gogo@gmail.com',
            'password'=> bcrypt('12345'),
            'phone'=> '082121121212',
            'address'=> 'Bogor',
            'id_department'=> 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('employments')->insert([
            'name'=> 'Jimbo',
            'gender'=> 'L',
            'email'=> 'jimbo@gmail.com',
            'password'=> bcrypt('12345'),
            'phone'=> '082121121212',
            'address'=> 'Bekasi',
            'id_department'=> 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('employments')->insert([
            'name'=> 'Koko',
            'gender'=> 'P',
            'email'=> 'koko@gmail.com',
            'password'=> bcrypt('12345'),
            'phone'=> '082121121212',
            'address'=> 'Jakarta',
            'id_department'=> 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('employments')->insert([
            'name'=> 'Baba',
            'gender'=> 'P',
            'email'=> 'baba@gmail.com',
            'password'=> bcrypt('12345'),
            'phone'=> '082121121212',
            'address'=> 'Jakarta',
            'id_department'=> 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

