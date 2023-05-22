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
        DB::table('users')->truncate();

        // Buat user investor
        User::create([
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'role' => 0,
        ]);

        // Buat user mitra_umkm
        User::create([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'role' => 1,
        ]);
    }
}
