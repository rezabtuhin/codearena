<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create([
            'name' => 'Rezab Ud Dawla',
            'email' => 'rezabuddawlatuhin@gmail.com',
            'password' => Hash::make(123456),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Tahalil Anik',
            'email' => 'anik@gmail.com',
            'password' => Hash::make(123456),
            'role' => 'user',
        ]);

    }
}
