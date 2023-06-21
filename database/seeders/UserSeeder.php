<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data pengguna yang sudah ada (optional)
        // DB::table('users')->truncate();

        // Buat user investor
        User::create([
            'name' => 'UserInvestor',
            'email' => 'investor1@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 0,
            'saldo' => 1000000000.00,
            'validasi_ktp' => 'invalid',
            'validasi_foto' => 'invalid',
        ]);

        // Buat user mitra_umkm
        User::create([
            'name' => 'UserMitra',
            'email' => 'mitra1@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 1,
            'saldo' => 1000000000.00,
            'validasi_ktp' => 'invalid',
            'validasi_foto' => 'invalid',
        ]);

        // Buat user ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'user@admin.com',
            'password' => Hash::make('useradmin'),
            'role' => 2,
            'saldo' => 1000000000.00,
            'validasi_ktp' => 'invalid',
            'validasi_foto' => 'invalid',
        ]);
    }
}
