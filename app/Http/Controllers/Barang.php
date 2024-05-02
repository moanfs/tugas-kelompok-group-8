<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;

class Barang extends Controller
{
    protected $barangModel;

    function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        // total laba bersih
        $totallaba = PenjualanModel::join('pembelian', 'pembelian.barangId', '=', 'penjualan.barangId')
            ->selectRaw('SUM((IF(penjualan.JumlahPenjualan IS NOT NULL, penjualan.HargaPenjual, 0) - pembelian.HargaPembelian) * IFNULL(penjualan.JumlahPenjualan, 0)) AS total_laba')
            ->first()->total_laba;
        // omset
        $omset = PenjualanModel::selectRaw('SUM(penjualan.HargaPenjual) * SUM(penjualan.JumlahPenjualan) AS omset')
            ->first()->omset;
        // modal
        $modal = PembelianModel::selectRaw('SUM(pembelian.HargaPembelian) * SUM(pembelian.JumlahPembelian) AS modal')
            ->first()->modal;

        $data = [
            'barang'            => $this->barangModel->getPembelian()->get(),
            'modal'             => $modal,
            'totallaba'         => $totallaba,
            'omset'             => $omset,
            'kuranglaku'        => $this->barangModel->getKurangLaku(),
            'laku'              => $this->barangModel->getLaku(),
        ];
        return view('barang', $data);
    }
}
