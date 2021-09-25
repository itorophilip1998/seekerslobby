<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PackageSeeder;
use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PackageSeeder::class,
            UsersTableSeeder::class
        ]);
    }
}
