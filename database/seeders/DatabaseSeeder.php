<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('barang')->insert([
            [
                'NamaBarang'    => 'Baju Panjang',
                'Keterangan'    => 'Baju lengan panjang untuk pria model baru'
            ],
            [
                'NamaBarang'    => 'Baju Pendek',
                'Keterangan'    => 'Baju lengan pendek untuk pria model baru'
            ],
            [
                'NamaBarang'    => 'Topi Golf',
                'Keterangan'    => 'Topi untuk olahraga golf'
            ],
        ]);

        DB::table('pembelian')->insert([
            [
                'JumlahPembelian'   => 20,
                'HargaPembelian'    => 40000,
                'BarangId'          => 1
            ],
            [
                'JumlahPembelian'   => 50,
                'HargaPembelian'    => 35000,
                'BarangId'          => 2
            ],
            [
                'JumlahPembelian'   => 30,
                'HargaPembelian'    => 70000,
                'BarangId'          => 3
            ],
        ]);

        DB::table('penjualan')->insert([
            [
                'JumlahPenjualan'   => 5,
                'HargaPenjual'      => 50000,
                'BarangId'          => 1
            ],
            [
                'JumlahPenjualan'   => 20,
                'HargaPenjual'      => 45000,
                'BarangId'          => 2
            ],
            [
                'JumlahPenjualan'   => 10,
                'HargaPenjual'      => 90000,
                'BarangId'          => 3
            ],
        ]);
    }
}
