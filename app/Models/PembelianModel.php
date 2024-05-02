<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianModel extends Model
{
    // use HasFactory;
    protected $table = "pembelian";
    protected $primaryKey = 'IdPembelian';

    protected $fillable = [
        'JumlahPembelian',
        'HargaPembelian',
        'BarangId',
    ];

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'IdBarang');
    }

    public function getPembelian()
    {
        return static::join('barang', 'barang.IdBarang', '=', 'pembelian.BarangId')
            ->select('barang.*', 'Pembelian.*');
    }
}
