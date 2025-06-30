<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admins;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
         Admins::create([
            'name' => 'Divya',
            'username' => 'divya@gmail.com',
            'password' => Hash::make('123456'),
            'type' => 'admin',
            'status' => 1,
        ]);
    }
}
