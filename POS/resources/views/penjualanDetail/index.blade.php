@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <button onclick="modalAction('{{ url('/penjualan-detail/show_ajax/'. $penjualan->penjualan_id) }}')" class="btn btn-info btn-sm">Detail Penjualan</button>
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('penjualan-detail/create/'. $penjualan->penjualan_id) }}">Tambah</a>
            <button onclick="modalAction('{{ url('/penjualan-detail/create_ajax/'. $penjualan->penjualan_id) }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Filter Berdasarkan Barang -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="barang_id" name="barang_id">
                            <option value="">- Semua -</option>
                            @foreach($barangs as $brg)
                                <option value="{{ $brg->barang_id }}">{{ $brg->barang_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Filter berdasarkan Barang</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_penjualan_detail">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Penjualan Kode</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
        <div class="mt-3 text-end">
            <a href="{{ url('penjualan') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Halaman Penjualan
            </a>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" databackdrop="static"data-keyboard="false" data-width="75%" aria-hidden="true"></div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    function modalAction(url = '') {
            $('#myModal').load(url, function () {
                $('#myModal').modal('show');
            });
    }

    var dataPenjualanDetail;
    $(document).ready(function() {
        var penjualan_id = "{{ $penjualan->penjualan_id}}";
        dataPenjualanDetail = $('#table_penjualan_detail').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                "url": "{{ url('penjualan-detail/list') }}/" + penjualan_id,
                "dataType": "json",
                "type": "POST",
                "data": function(d) {
                    // Ambil nilai barang_id dari filter
                    d.barang_id = $('#barang_id').val();
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
                    // Menampilkan penjualan_kode dari relasi penjualan
                    data: "penjualan.penjualan_kode",
                    orderable: true,
                    searchable: true
                },
                {
                    // Menampilkan nama barang dari relasi barang
                    data: "barang.barang_nama",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "jumlah",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "harga",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        $('#barang_id').on('change', function() {
            dataPenjualanDetail.ajax.reload();
        });
    });
</script>
@endpush
