@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('stok/create') }}">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        {{-- Filter --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="barang_id">Barang</label>
                    <select class="form-control" id="barang_id" name="barang_id">
                        <option value="">- Semua Barang -</option>
                        @foreach($barang as $b)
                            <option value="{{ $b->barang_id }}">{{ $b->barang_nama }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Filter berdasarkan Barang</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="user_id">User</label>
                    <select class="form-control" id="user_id" name="user_id">
                        <option value="">- Semua User -</option>
                        @foreach($user as $u)
                            <option value="{{ $u->user_id }}">{{ $u->username }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Filter berdasarkan User</small>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="supplier_id">Supplier</label>
                    <select class="form-control" id="supplier_id" name="supplier_id">
                        <option value="">- Semua Supplier -</option>
                        @foreach($supplier as $s)
                            <option value="{{ $s->supplier_id }}">{{ $s->supplier_nama }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Filter berdasarkan Supplier</small>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_stok">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Barang</th>
                    <th>User</th>
                    <th>Supplier</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('css')
{{-- Jika butuh CSS khusus silakan taruh di sini --}}
@endpush

@push('js')
<script>

$(document).ready(function() {
    var dataStok = $('#table_stok').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            "url": "{{ url('stok/list') }}", // Pastikan route ini sesuai
            "type": "POST",
            "data": function (d) {
                d.barang_id   = $('#barang_id').val();
                d.user_id     = $('#user_id').val();
                d.supplier_id = $('#supplier_id').val();
            }
        },
        searchDelay: 1000,
        columns: [
            {
                data: "DT_RowIndex",
                className: "text-center",
                orderable: false,
                searchable: false
            },
            {
                data: "barang.barang_nama",
                orderable: true,
                searchable: true
            },
            {
                data: "user.username",
                orderable: true,
                searchable: true
            },
            {
                data: "supplier.supplier_nama",
                orderable: true,
                searchable: true
            },
            {
                data: "stok_tanggal",
                orderable: true,
                searchable: true
            },
            {
                data: "stok_jumlah",
                orderable: true,
                searchable: true
            },
            {
                data: "aksi",
                className: "",
                orderable: false,
                searchable: false
            }
        ]
    });

    // Reload DataTables jika filter berubah
    $('#barang_id, #user_id, #supplier_id').on('change', function() {
        dataStok.ajax.reload();
    });

});
</script>
@endpush
