@extends('layout.app')

@section('title', 'Tabel Penjualan')

@section( 'content')
<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Data Penjualan Barang</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr class="">
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Jumlah Terjual</th>
                        <th scope="col">Omset</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ( $penjualan as $key => $value )
                    <tr>
                        <th>{{$key +1}}</th>
                        <th>{{$value->NamaBarang}}</th>
                        <th>{{$value->Keterangan}}</th>
                        <th>Rp.{{$value->HargaPenjual}}</th>
                        <th>{{$value->JumlahPenjualan}}</th>
                        <th>Rp.{{$value->JumlahPenjualan * $value->HargaPenjual}}</th>
                    </tr>
                    @empty
                    <span>Tidak Ada Data Yang Bisa Ditampilkan</span>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection