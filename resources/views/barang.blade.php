@extends('layout.app')

@section('title', 'Tabel Barang')

@section( 'content')
<div class="content">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>Dashboard</h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr class="">
                        <th scope="col">No</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga Barang</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Jumlah Terjual</th>
                        <th scope="col">Sisa Stok</th>
                        <!-- <th scope="col">Total Modal</th> -->
                        <th scope="col">Margin</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ( $barang as $key => $value )
                    <tr>
                        <th>{{$key +1}}</th>
                        <th>{{$value->NamaBarang}}</th>
                        <th>Rp.{{$value->HargaPembelian}}</th>
                        <th>Rp.{{$value->HargaPenjual}}</th>
                        <th>{{$value->JumlahPenjualan}}</th>
                        <th>{{$value->JumlahPembelian - $value->JumlahPenjualan}}</th>

                        <th>Rp.{{($value->HargaPenjual - $value->HargaPembelian) * $value->JumlahPenjualan }}</th>
                    </tr>
                    @empty
                    <span>Tidak Ada Data Yang Bisa Ditampilkan</span>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="row row-cols-1 mt-2 row-cols-md-4 g-4 mx-auto d-flex justify-content-between">
        <!-- laporan akutansi-->
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Margin
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Modal</span>
                        <span>Rp.{{$modal}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Omset</span>
                        <span>Rp.{{$omset}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total Laba Bersih</span>
                        <span>Rp.{{$totallaba}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- laporan barang kurang laku -->
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Barang Yang Kurang Laris
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($kuranglaku as $value )
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{$value->NamaBarang}}</span>
                        <span>@if (is_null($value->JumlahPenjualan) || $value->JumlahPenjualan == 0)
                            0
                            @else
                            {{$value->JumlahPenjualan}}
                            @endif
                        </span>
                    </li>
                    @empty
                    <span>Tidak Ada Data</span>
                    @endforelse

                </ul>
            </div>
        </div>
        <!-- laporan barang terlaku -->
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Barang Yang Laris
                </div>
                <ul class="list-group list-group-flush">
                    @forelse ($laku as $value )
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{$value->NamaBarang}}</span>
                        <span>{{$value->JumlahPenjualan}}</span>
                    </li>
                    @empty
                    <span>Tidak Ada Data</span>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection