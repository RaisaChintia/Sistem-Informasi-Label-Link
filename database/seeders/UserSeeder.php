<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'username' => 'admin',   // username login
            'email' => 'admin@example.com', // optional
            'password' => Hash::make('password123'), // password login
        ]);
    }
}
