@extends('layout.app')

@section('title', 'Tabel Tambah Pembelian')

@section( 'content')
<div class="content">
    @if (session()->has('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{session('error')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h4>Tambah Pembelian Barang</h4>
        </div>
        <div class="card-body">
            <form class="row" action="{{route('pembelian.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama" name="NamaBarang" value="{{old('NamaBarang')}}">
                    @error('NamaBarang')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="Keterangan" value="{{old('Keterangan')}}">
                    @error('Keterangan')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="JumlahPembelian" class="form-label">Jumlah Pembelian</label>
                    <input type="number" class="form-control" id="JumlahPembelian" name="JumlahPembelian" value="{{old('JumlahPembelian')}}">
                    @error('JumlahPembelian')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="HargaPembelian" class="form-label">Harga Pembelian</label>
                    <input type="number" class="form-control" id="HargaPembelian" name="HargaPembelian" value="{{old('HargaPembelian')}}">
                    @error('HargaPembelian')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="HargaPenjual" class="form-label">Harga Penjualan</label>
                    <input type="number" class="form-control" id="HargaPenjual" name="HargaPenjual" value="{{old('HargaPenjual')}}">
                    @error('HargaPenjual')
                    <span class="text-rose-500">
                        <p>{{ $message }}</p>
                    </span>
                    @enderror
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Tambah Barang</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection