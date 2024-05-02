<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;

class Simulasi extends Controller
{
    protected $barangModel;

    function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $barang =  $this->barangModel->getPembelian()->get();
        return view('index', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'JumlahPenjualan'   => 'required',
        ]);

        $barang = BarangModel::findOrFail($id);
        $penjualan = PenjualanModel::where('BarangId', $id)->firstOrFail();
        $pembelian = PembelianModel::where('BarangId', $id)->firstOrFail();

        // Tambahkan jumlah pembelian baru ke jumlah pembelian yang sudah ada
        $JumlahPenjualanbaru = $request->JumlahPenjualan;
        $jumlahPenjualanTotal = $penjualan->JumlahPenjualan + $JumlahPenjualanbaru;

        if ($pembelian->JumlahPembelian < $jumlahPenjualanTotal) {
            return redirect()->route('simulasi.index')->with(['error' => 'Stok Tidak Cukup']);
        } else {
            $penjualan->update([
                'JumlahPenjualan'   =>  $jumlahPenjualanTotal,
            ]);
            return redirect()->route('simulasi.index')->with(['message' => 'Berhasil Beli Barang']);
        }
    }
}
