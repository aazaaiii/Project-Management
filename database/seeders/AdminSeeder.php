<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use RuntimeException;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (!$email || !$password) {
            throw new RuntimeException('ADMIN_EMAIL dan ADMIN_PASSWORD harus diatur di file .env');
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Admin JOELL',
                'password' => Hash::make($password),
                'role' => 'admin',
            ]
        );
    }
}
