<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Root / Admin Utama
        User::updateOrCreate(
            ['email' => 'admin@root.com'], // Mencegah duplikat jika dijalankan ulang
            [
                'name' => 'Wayan Admin Root',
                'password' => Hash::make('password123'), // Password untuk login
                'is_otp_verified' => true, // Langsung aktif tanpa verifikasi OTP lagi
            ]
        );

        // 2. Akun Petani / Operator Lahan
        User::updateOrCreate(
            ['email' => 'petani@smartirrigation.com'],
            [
                'name' => 'Made Petani Modern',
                'password' => Hash::make('password123'),
                'is_otp_verified' => true,
            ]
        );
    }
}