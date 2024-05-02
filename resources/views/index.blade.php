@extends('layout.app')

@section('title', 'Tabel Barang')

@section( 'content')
<div class="content">
    @if (session()->has('message'))
    <div class="alert alert-primary text-center" role="alert">
        {{session('message')}}
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{session('error')}}
    </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ( $barang as $key => $value )
        @if ($value->JumlahPembelian - $value->JumlahPenjualan != 0)
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{$value->NamaBarang}}</h5>
                    <p class="card-text">{{$value->Keterangan}}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <h6 class="card-subtitle mb-2 text-body-secondary">Rp.{{$value->HargaPenjual}}</h6>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Stok {{$value->JumlahPembelian - $value->JumlahPenjualan}}</h6>
                    </div>
                    <form action="{{route('simulasi.update', $value->IdBarang)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="d-flex justify-content-between">
                            <input type="number" class="form-control" value="1" name="JumlahPenjualan">
                            <button type="submit" class="btn btn-sm btn-primary">Beli Sekarang!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endif
        @empty
        <span>Tidak Ada Data Yang Bisa Ditampilkan</span>
        @endforelse
    </div>
</div>
@endsection