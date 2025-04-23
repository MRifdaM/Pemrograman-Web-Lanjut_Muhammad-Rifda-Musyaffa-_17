<!DOCTYPE html>
<html>
<head>
    <title>Data Penjualan</title>
</head>
<body>
    <h1>Data Penjualan</h1>
    <a href="{{ url('penjualan/tambah') }}">+ Tambah Penjualan</a>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>Penjualan ID</th>
            <th>Nama User</th>
            <th>Pembeli</th>
            <th>Kode Penjualan</th>
            <th>Tanggal Penjualan</th>
            <th>Aksi</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->penjualan_id }}</td>
            <td>{{ $d->user->nama }}</td>
            <td>{{ $d->pembeli }}</td>
            <td>{{ $d->penjualan_kode }}</td>
            <td>{{ $d->penjualan_tanggal }}</td>
            <td>
                <a href="{{ url('penjualan/ubah/'.$d->penjualan_id) }}">Edit</a>
                <a href="{{ url('penjualan/hapus/'.$d->penjualan_id) }}">Hapus</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
