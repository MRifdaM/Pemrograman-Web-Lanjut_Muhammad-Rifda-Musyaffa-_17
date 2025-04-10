@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($penjualanDetail)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <h5>Data Penjualan</h5>
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID Penjualan</th>
                    <td>{{ $penjualanDetail->penjualan->penjualan_id }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $penjualanDetail->penjualan->user->username ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Penjualan Kode</th>
                    <td>{{ $penjualanDetail->penjualan->penjualan_kode }}</td>
                </tr>
                <tr>
                    <th>Pembeli</th>
                    <td>{{ $penjualanDetail->penjualan->pembeli }}</td>
                </tr>
                <tr>
                    <th>Penjualan Tanggal</th>
                    <td>{{ $penjualanDetail->penjualan->penjualan_tanggal }}</td>
                </tr>
            </table>
            <br>

            <h5>Data Detail</h5>
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID Detail</th>
                    <td>{{ $penjualanDetail->detail_id }}</td>
                </tr>
                <tr>
                    <th>Barang</th>
                    <td>{{ $penjualanDetail->barang->barang_nama }}</td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>{{ $penjualanDetail->jumlah }}</td>
                </tr>
                <tr>
                    <th>Harga</th>
                    <td>{{ $penjualanDetail->harga }}</td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('penjualan-detail/' . $penjualanDetail->penjualan->penjualan_id) }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
