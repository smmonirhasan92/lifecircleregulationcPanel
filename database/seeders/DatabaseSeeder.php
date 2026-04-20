<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (\App\Models\User::count() == 0) {
            \App\Models\User::create([
                'name' => 'Admin',
                'email' => 'admin@lifecircle.com',
                'password' => bcrypt('password123'),
            ]);
        }
    }
}
