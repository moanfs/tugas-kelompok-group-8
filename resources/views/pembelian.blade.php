@extends('layout.app')

@section('title', 'Tabel Pembelian')

@section( 'content')
<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Data Pembelian Barang</h4>
            <a class="btn btn-primary" href="{{route('pembelian.create')}}"> Tambah Data</a>
        </div>
        <div class="card-body">
            @if (session()->has('message'))
            <div class="alert alert-primary text-center" role="alert">
                {{session('message')}}
            </div>
            @endif
            @if (session()->has('erorr'))
            <div class="alert alert-danger text-center" role="alert">
                {{session('erorr')}}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr class="">
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @forelse ( $pembelian as $key => $value )
                <tbody>
                    <tr>
                        <th>{{$key +1}}</th>
                        <th>{{$value->NamaBarang}}</th>
                        <th>{{$value->Keterangan}}</th>
                        <th>{{$value->HargaPembelian}}</th>
                        <th>{{$value->JumlahPembelian}}</th>
                        <th class="d-flex">
                            <a href="{{route('pembelian.edit', $value->IdBarang)}}" class="btn btn-sm btn-info mx-2"><i class="bi bi-pencil-square"></i></a>
                            <form onsubmit="return confirm('Apakah Anda Yakin Ingin Hapus?');" action="{{ route('pembelian.destroy', $value->IdBarang) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </th>
                    </tr>
                </tbody>
                @empty
                <span class="d-flex justify-content-center"><b>Data Pembelian Kosong</b></span>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection