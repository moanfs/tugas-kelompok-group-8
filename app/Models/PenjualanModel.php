<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
    // use HasFactory;
    protected $table = "penjualan";
    protected $primaryKey = 'IdPenjualan';

    protected $fillable = [
        'JumlahPenjualan',
        'HargaPenjual',
        'BarangId',
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'IdBarang');
    }

    public function getPenjualan()
    {
        return static::rightJoin('barang', 'penjualan.BarangId', '=', 'barang.IdBarang')
            ->join('pembelian', 'pembelian.BarangId', '=', 'barang.IdBarang')
            ->select('barang.*', 'penjualan.*', 'pembelian.*');
    }
}
