@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('barang/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Filter Berdasarkan Kategori -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            <option value="">- Semua -</option>
                            @foreach($kategori as $kat)
                                <option value="{{ $kat->kategori_id }}">{{ $kat->nama_kategori }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Filter berdasarkan kategori</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
<script>
$(document).ready(function() {
    var dataBarang = $('#table_barang').DataTable({
        serverSide: true,
        ajax: {
            url: "{{ url('barang/list') }}",
            dataType: "json",
            type: "POST",
            // Kirim kategori_id sebagai parameter untuk filter
            data: function(d) {
                d.kategori_id = $('#kategori_id').val();
            }
        },
        columns: [
            {
                data: "DT_RowIndex",
                className: "text-center",
                orderable: false,
                searchable: false
            },
            {
                data: "barang_kode",
                orderable: true,
                searchable: true
            },
            {
                data: "barang_nama",
                orderable: true,
                searchable: true
            },
            {
                // Tampilkan nama kategori dari relasi
                data: "kategori.nama_kategori",
                orderable: false,
                searchable: false
            },
            {
                data: "aksi",
                orderable: false,
                searchable: false
            }
        ]
    });

    // Saat filter berubah, reload DataTables
    $('#kategori_id').on('change', function() {
        dataBarang.ajax.reload();
    });
});
</script>
@endpush
