<?php

namespace App\Models;

use App\Http\Controllers\Barang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

class BarangModel extends Model
{
    // use HasFactory;
    protected $table = "barang";
    protected $primaryKey = 'IdBarang';

    protected $fillable = [
        'NamaBarang',
        'Keterangan',
    ];

    public function pembelian()
    {
        return $this->hasMany(PembelianModel::class, 'BarangId');
    }

    public function penjualan()
    {
        return $this->hasMany(PenjualanModel::class, 'BarangId');
    }

    public function getPembelian()
    {
        return static::leftJoin('pembelian', 'barang.IdBarang', '=', 'pembelian.BarangId')
            ->leftJoin('penjualan', 'penjualan.BarangId', '=', 'barang.IdBarang')
            ->select('barang.*', 'Pembelian.*', 'penjualan.*');
    }

    public function getKurangLaku()
    {
        return static::leftJoin('penjualan', 'penjualan.BarangId', '=', 'barang.IdBarang')
            ->where(function ($query) {
                $query->where('penjualan.JumlahPenjualan', '<', 10)
                    ->orWhereNull('penjualan.JumlahPenjualan');
            })
            ->orderBy('penjualan.JumlahPenjualan', 'asc')
            ->take(3)
            ->get();
    }

    public function getLaku()
    {
        return static::leftJoin('penjualan', 'penjualan.BarangId', '=', 'barang.IdBarang')
            ->orderBy('penjualan.JumlahPenjualan', 'desc')
            ->take(3)
            ->get();
    }
}
