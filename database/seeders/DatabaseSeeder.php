<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // ✅ Buat / update admin user (tidak akan duplicate)
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // kunci unik
            [
                'name' => 'Admin User',
                'password' => bcrypt('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // ✅ Buat dummy users (kalau perlu)
        User::factory(10)->create();
    }
}
