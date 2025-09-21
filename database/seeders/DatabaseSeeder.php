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
            ['username' => 'admin'], // ganti kunci unik ke username
            [
                'name' => 'Admin User',
                'username' => 'admin', // <---- login pakai ini
                'email' => 'admin@gmail.com', // opsional, boleh kosong
                'password' => bcrypt('password123'),
            ]
        );

        // ❌ Hapus atau perbaiki factory user
        // User::factory(10)->create();

        // ✅ Kalau mau tetap buat dummy user, pastikan factory punya username
        // User::factory(10)->create([
        //     'username' => fake()->userName(),
        // ]);
    }
}
