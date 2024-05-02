<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('IdBarang');
            $table->string('NamaBarang');
            $table->string('Keterangan');
            $table->timestamps();
        });

        Schema::create('pembelian', function (Blueprint $table) {
            $table->id('IdPembelian');
            $table->integer('JumlahPembelian');
            $table->integer('HargaPembelian');
            $table->unsignedBigInteger('BarangId');
            $table->timestamps();
            $table->foreign('BarangId')->references('IdBarang')->on('barang')->onDelete('cascade');
        });

        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('IdPenjualan');
            $table->integer('JumlahPenjualan')->nullable(true);
            $table->integer('HargaPenjual');
            $table->unsignedBigInteger('BarangId');
            $table->timestamps();
            $table->foreign('BarangId')->references('IdBarang')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
        Schema::dropIfExists('penjualan');
        Schema::dropIfExists('barang');
    }
};
