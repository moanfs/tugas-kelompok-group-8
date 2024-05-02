<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\PenjualanModel;
use Illuminate\Http\Request;

class Pembelian extends Controller
{
    protected $pembelianModel;

    function __construct()
    {
        $this->pembelianModel = new PembelianModel();
    }

    public function index()
    {
        $data = [
            'pembelian' =>  $this->pembelianModel->getPembelian()->get()
        ];
        return view('pembelian', $data);
    }

    public function create()
    {
        return view('pembelian-create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'NamaBarang'        => 'required|min:3|max:100',
            'Keterangan'        => 'required|min:5|max:255',
            'HargaPembelian'    => 'required',
            'JumlahPembelian'   => 'required',
            'HargaPenjual'      => 'required',
        ]);

        if ($request->HargaPembelian >=  $request->HargaPenjual) {
            return redirect()->route('pembelian.create')->withInput()->with(['error' => 'Harga Penjualan Tidak Boleh Lebih Rendah Dari Harga Pembelian']);
        } else {
            $barang = BarangModel::create([
                'NamaBarang'     => $request->NamaBarang,
                'Keterangan'     => $request->Keterangan,
            ]);

            $barang->pembelian()->create([
                'HargaPembelian'    => $request->HargaPembelian,
                'JumlahPembelian'   => $request->JumlahPembelian,
            ]);

            $barang->penjualan()->create([
                'HargaPenjual'   =>  $request->HargaPenjual,
            ]);
            return redirect()->route('pembelian.index')->with(['message' => 'Data berhasil Ditamabah']);
        }
    }

    public function edit($id)
    {
        $barang = BarangModel::findOrFail($id);
        $pembelian = PembelianModel::where('BarangId', $id)->firstOrFail();
        $penjualan = PenjualanModel::where('BarangId', $id)->firstOrFail();
        return view('pembelian-edit', compact('barang', 'pembelian', 'penjualan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'NamaBarang'        => 'required|min:3|max:100',
            'Keterangan'        => 'required|min:5|max:255',
            'HargaPembelian'    => 'required',
            'JumlahPembelian'   => 'required',
            'HargaPenjual'      => 'required',
        ]);

        $barang = BarangModel::findOrFail($id);
        $pembelian = PembelianModel::where('BarangId', $id)->firstOrFail();
        $penjualan = PenjualanModel::where('BarangId', $id)->firstOrFail();

        $barang->update([
            'NamaBarang' => $request->NamaBarang,
            'Keterangan' => $request->Keterangan,
        ]);

        $pembelian->update([
            'HargaPembelian'    => $request->HargaPembelian,
            'JumlahPembelian'   => $request->JumlahPembelian,
        ]);

        $penjualan->update([
            'HargaPenjual'   =>  $request->HargaPenjual,
        ]);

        return redirect()->route('pembelian.index')->with(['message' => 'Data berhasil Di Edit']);;
    }

    public function destroy($id)
    {
        $barang = BarangModel::findOrFail($id);
        $barang->delete();
        return redirect()->route('pembelian.index')->with(['error' => 'Data berhasil Di Hapus']);
    }
}
