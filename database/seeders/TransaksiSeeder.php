<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('transaksi')->insert([
                'id' => Str::uuid(),
                'id_user' => 1,
                'id_mitra' => 6,
                'jenis_pembayaran' => 'cicil',
                'jumlah_pembayaran' => 100000,
                'waktu_pembayaran' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
