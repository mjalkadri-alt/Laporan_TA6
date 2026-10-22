<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Membuat akun demo untuk mencoba fitur autentikasi LaporBanjir.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@laporbanjir.test'],
            [
                'name' => 'Admin LaporBanjir',
                'password' => 'password',
                'email_verified_at' => now(),
            ],
        );
    }
}
