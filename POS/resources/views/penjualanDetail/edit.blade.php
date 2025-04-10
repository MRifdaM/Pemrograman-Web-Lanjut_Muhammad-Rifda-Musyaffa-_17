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
            <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
            <form method="POST" action="{{ url('penjualan-detail/'.$penjualanDetail->detail_id) }}" class="form-horizontal">
                @csrf
                {!! method_field('PUT') !!}

                {{-- Hidden Penjualan ID (dalam bentuk terenkripsi) --}}
                <input type="hidden" name="penjualan_id" value="{{ encrypt($penjualanDetail->penjualan_id) }}">

                <!-- Tampilkan Informasi Header Penjualan -->
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Kode Penjualan</label>
                    <div class="col-10">
                        <input type="text" class="form-control" value="{{ $penjualanDetail->penjualan->penjualan_kode }}" readonly>
                    </div>
                </div>

                <!-- Pilihan Barang (nilai harga_jual disimpan sebagai data attribute) -->
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Barang</label>
                    <div class="col-10">
                        <select class="form-control" name="barang_id" id="barang_id" required>
                            <option value="">- Pilih Barang -</option>
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->barang_id }}"
                                    data-harga="{{ $barang->harga_jual }}"
                                    {{ old('barang_id', $penjualanDetail->barang_id) == $barang->barang_id ? 'selected' : '' }}>
                                    {{ $barang->barang_nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('barang_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Jumlah -->
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Jumlah</label>
                    <div class="col-10">
                        <input type="number" min="1" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $penjualanDetail->jumlah) }}" required>
                        @error('jumlah')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Harga (readonly, dihitung otomatis) -->
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label">Harga</label>
                    <div class="col-10">
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ old('harga', $penjualanDetail->harga) }}" readonly required>
                        @error('harga')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="form-group row">
                    <label class="col-2 control-label col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                        <a href="{{ url('penjualan-detail/'.$penjualanDetail->penjualan->penjualan_id) }}" class="btn btn-sm btn-default ml-1">Kembali</a>
                    </div>
                </div>

            </form>
        @endempty
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
$(document).ready(function(){
    function hitungHarga(){
        var selectedOption = $('#barang_id').find('option:selected');
        var hargaJual = parseFloat(selectedOption.data('harga')) || 0;
        var jumlah = parseFloat($('#jumlah').val()) || 0;
        var totalHarga = hargaJual * jumlah;
        $('#harga').val(totalHarga.toFixed(2));
    }

    // Perhitungan otomatis ketika pilihan barang atau jumlah berubah
    $('#barang_id').on('change', function(){
       hitungHarga();
    });
    $('#jumlah').on('input', function(){
       hitungHarga();
    });
});
</script>
@endpush
