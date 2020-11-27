<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(12),
                'created_at' => now(),
                'updated_at' => now()
                ]
            );
            DB::table('users')->insert(

                [
                    'name' => 'Admin2',
                    'email' => 'admin2@gmail.com',
                    'password' => bcrypt('12345'),
                    'remember_token' => Str::random(12),
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        }
    }
