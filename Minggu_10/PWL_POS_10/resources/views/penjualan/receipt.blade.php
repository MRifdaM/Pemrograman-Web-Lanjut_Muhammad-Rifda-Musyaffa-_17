<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        body {
            font-family: "Courier New", Courier, monospace;
            font-size: 11px;
            margin: 5px;
        }
        .text-center { text-align: center; }
        .text-right  { text-align: right; }
        .text-left   { text-align: left; }
        .border-top   { border-top: 1px dashed #000; }
        table { width: 100%; border-collapse: collapse; }
        td, th { padding: 2px 4px; }
    </style>
</head>
<body>
    <div class="text-center">
        <strong>MOJO MART</strong><br>
        Jl. Centong No.12, Mojokerto<br>
        Telp: 0812-3456-7890
    </div>

    <div class="border-top"></div>

    <table>
        <tr>
            <td>Kode</td>
            <td>: {{ $penjualan->penjualan_kode }}</td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>: {{ \Carbon\Carbon::parse($penjualan->penjualan_tanggal)->format('Y-m-d H:i') }}</td>
        </tr>
        <tr>
            <td>Kasir</td>
            <td>: {{ $penjualan->user->username }}</td>
        </tr>
        <tr>
            <td>Pembeli</td>
            <td>: {{ $penjualan->pembeli }}</td>
        </tr>
    </table>

    <div class="border-top"></div>

    <table>
        <thead>
            <tr>
                <th class="text-left">Nama Barang</th>
                <th>Harga</th>
                <th class="text-center">Qty</th>
                <th class="text-right">Subtotal</th>
            </tr>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($penjualan->penjualanDetail as $detail)
            <tr>
                <td>{{ $detail->barang->barang_nama }}</td>
                <td>{{ $detail->barang->harga_jual }}</td>
                <td class="text-center">{{ $detail->jumlah }}</td>
                <td class="text-right">{{ number_format($detail->harga, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" class="text-right"><strong>Total</strong></td>
                <td class="text-right">
                    <strong>{{ number_format($penjualan->penjualanDetail->sum('harga'), 0, ',', '.') }}</strong>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="border-top"></div>

    <div class="text-center">
        Terima kasih atas kunjungan Anda!<br>
        ---
    </div>
</body>
</html>
