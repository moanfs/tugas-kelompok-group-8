@extends('layout.app')

@section('title', 'Tabel Edit Pembelian')

@section( 'content')
<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h4>Edit Pembelian Barang</h4>
        </div>
        <div class="card-body">
            <form class="row" action="{{route('pembelian.update', $barang->IdBarang)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="NamaBarang" value="{{old('NamaBarang', $barang->NamaBarang)}}">
                    @error('NamaBarang')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="Keterangan" value="{{old('Keterangan', $barang->Keterangan)}}">
                    @error('Keterangan')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="JumlahPembelian" class="form-label">Jumlah Pembelian</label>
                    <input type="number" class="form-control" id="JumlahPembelian" name="JumlahPembelian" value="{{old('JumlahPembelian', $pembelian->JumlahPembelian)}}">
                    @error('JumlahPembelian')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="HargaPembelian" class="form-label">Harga Pembelian</label>
                    <input type="number" class="form-control" id="HargaPembelian" name="HargaPembelian" value="{{old('HargaPembelian', $pembelian->HargaPembelian)}}">
                    @error('JumlahPembelian')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="HargaPenjual" class="form-label">Harga Penjualan</label>
                    <input type="number" class="form-control" id="HargaPenjual" name="HargaPenjual" value="{{old('HargaPenjual', $penjualan->HargaPenjual)}}">
                    @error('HargaPenjual')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Edit Barang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection