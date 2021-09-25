<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // if(DB::table('users')->count() == 0){

            DB::table('users')->insert([
                'name' => 'Administrator',
                'email' => 'paddipay.app@gmail.com',
                'password' => bcrypt('@Paddipay2021'),
                'role' => 'admin',
                'ref_code' => Str::random(8),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),


            ]);

        // } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
