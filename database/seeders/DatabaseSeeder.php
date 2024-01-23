<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => env('USER_NAME', 'admin'),
            'email' => env('USER_EMAIL', 'admin@user.com'),
            'password' => bcrypt(env('USER_PASSWORD', 'password')),
        ]);
    }
}
