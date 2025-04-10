@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('penjualan-detail') }}" class="form-horizontal">
            @csrf

            {{-- Penjualan Kode (penjualan_id dienkripsi) --}}
            <input type="hidden" name="penjualan_id" value="{{ encrypt($penjualan->penjualan_id) }}">

            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Penjualan Kode</label>
                <div class="col-11">
                    <input type="text" class="form-control" name="penjualan_kode" value="{{ $penjualan->penjualan_kode }}" readonly>
                </div>
            </div>

            <!-- Pilihan Barang dengan harga_jual sebagai data attribute -->
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Barang</label>
                <div class="col-11">
                    <select class="form-control" name="barang_id" id="barang_id" required>
                        <option value="">- Pilih Barang -</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->barang_id }}"
                                data-harga="{{ $barang->harga_jual }}"
                                {{ old('barang_id') == $barang->barang_id ? 'selected' : '' }}>
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
                <label class="col-1 control-label col-form-label">Jumlah</label>
                <div class="col-11">
                    <input type="number" min="1" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required>
                    @error('jumlah')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Harga (readonly, dihitung otomatis) -->
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Harga</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="harga" name="harga" value="0" readonly required>
                    @error('harga')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('penjualan-detail/'. $penjualan->penjualan_id) }}">Kembali</a>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
$(document).ready(function() {
    // Fungsi untuk menghitung harga total
    function hitungHarga() {
        var selectedOption = $('#barang_id').find('option:selected');
        var hargaJual = parseFloat(selectedOption.data('harga')) || 0;
        var jumlah = parseFloat($('#jumlah').val()) || 0;
        var totalHarga = hargaJual * jumlah;
        // Format nilai total menjadi angka dengan 2 desimal atau sesuai kebutuhan
        $('#harga').val(totalHarga.toFixed(2));
    }

    // Jalankan perhitungan ketika barang dipilih
    $('#barang_id').on('change', function() {
        hitungHarga();
    });

    // Jalankan perhitungan ketika jumlah berubah
    $('#jumlah').on('input', function() {
        hitungHarga();
    });
});
</script>
@endpush
