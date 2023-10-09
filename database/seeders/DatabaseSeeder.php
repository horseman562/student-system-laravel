<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'usertype' => 'teacher',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@example.com',
                'usertype' => 'teacher',
                'password' => Hash::make('password456'),
            ],
            // Add more records as needed
        ]);
    }
}
